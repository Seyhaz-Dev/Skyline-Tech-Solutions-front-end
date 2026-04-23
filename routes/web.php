<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\UserController;
use App\Models\Tenant;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('properties', PropertyController::class);
Route::resource('tenants', TenantController::class);
Route::resource('leases', LeaseController::class);
Route::resource('payments', PaymentController::class);
Route::resource('maintenance', MaintenanceRequestController::class);
Route::resource('users', UserController::class);


Route::get('/rents', [RentsController::class, 'index'])->name('rents.index');


Route::get('/contact', fn() => view('contact'));
Route::get('/hello', fn() => view('hello'));
Route::get('/header', fn() => view('layouts.header'));
Route::get('/test', fn() => view('layouts.test'));