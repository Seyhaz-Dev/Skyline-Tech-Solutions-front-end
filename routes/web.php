<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\UserController;

use App\Models\Tenant;
use App\Http\Controllers\PropertyController;

use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard.index', [DashboardController::class, 'index'])->name('dashboard.index');

Route::post('/rents',[RentsController::class, 'store'])->name('rents.store');
Route::get('/rents',[RentsController::class, 'index']);

Route::resource('properties', PropertiesController::class);
Route::resource('tenants', TenantController::class);
Route::resource('leases', LeaseController::class);
Route::resource('payments', PaymentController::class);
Route::resource('maintenance', MaintenanceRequestController::class);
Route::resource('users', UserController::class);


Route::get('/hello', function () {
    return view('hello');
});
Route::get('/header', function () {
    return view('layouts.header');
});
Route::get('/rent', [RentsController::class, 'index']);

Route::get('/properties.index', [PropertyController::class, 'index']);


Route::get('/contact', fn() => view('contact'));
Route::get('/hello', fn() => view('hello'));
Route::get('/header', fn() => view('layouts.header'));
Route::get('/test', fn() => view('layouts.test'));


// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Login/Logout routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');