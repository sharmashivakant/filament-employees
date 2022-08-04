<?php

//use App\Filament\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use app\Http\Resources\EmployeeResource;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employess',function(){

        $employees = Employee:: orderBy('last_name')->get();

        return EmployeeResource::collection($employees);
});

