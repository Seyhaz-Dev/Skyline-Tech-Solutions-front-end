<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/leases', function () {
    return view('leases');
});

Route::get('/test',function(){
    return view("layouts.test");
});

Route::get('/rents',[RentsController::class, 'index']);

Route::get('/dashboard',[DashboardController::class, 'index']);