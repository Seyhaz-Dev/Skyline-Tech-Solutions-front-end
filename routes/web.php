<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});


// ================= OPTIONAL =================
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/create', [PropertyController::class, 'create']);
Route::post('/properties', [PropertyController::class, 'store']);

Route::get('/properties/{id}', [PropertyController::class, 'show']); // DETAIL PAGE
Route::delete('/properties/{id}', [PropertyController::class, 'destroy']); // DELETE
// ================= AUTH =================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================= DASHBOARD =================
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');
Route::get('/properties', function () {
    return view('properties.index');
})->name('properties.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


// ================= RENTS =================
Route::get('/rents', [RentsController::class, 'index'])->name('rents.index');
Route::post('/rents', [RentsController::class, 'store'])->name('rents.store');

Route::resource('properties', PropertyController::class);
Route::resource('tenants', TenantController::class);
Route::resource('leases', LeaseController::class);
Route::resource('payments', PaymentController::class);
Route::resource('maintenance', MaintenanceRequestController::class);
Route::resource('users', UserController::class);


// ================= EXTRA VIEWS =================
Route::view('/contact', 'contact');
Route::view('/hello', 'hello');
Route::view('/header', 'components.header');
Route::view('/test', 'layouts.test');



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
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');