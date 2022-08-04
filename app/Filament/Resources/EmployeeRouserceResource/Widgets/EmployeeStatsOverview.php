<?php

namespace App\Filament\Resources\EmployeeRouserceResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Employee;
use App\Models\Country;
class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $in =Country::where('country_code','in')->withcount('employees')->first();
        $ind =Country::where('country_code','ind')->withcount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make(' in Employees', $in ? $in->employees_count:0),
            Card::make(' ind Employees',$ind ? $ind->employees_count:0),
            //Card::make('Average time on page', '3:12'),
        ];
    }
}
