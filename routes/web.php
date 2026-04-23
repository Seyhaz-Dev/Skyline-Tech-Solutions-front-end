<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeasesController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard (ONLY ONE)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Leases
Route::get('/leases', function () {
    return view('leases');
})->name('leases.index');

// Rents
Route::get('/rents', [RentsController::class, 'index'])->name('rents.index');

// Payments (IMPORTANT)
Route::get('/payments', function () {
    return view('payments.index');
})->name('payments.index');

Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

// Other pages
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/header', function () {
    return view('layouts.header');
});

Route::get('/test', function () {
    return view('layouts.test');
});