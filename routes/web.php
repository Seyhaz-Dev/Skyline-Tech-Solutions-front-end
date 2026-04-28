<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard.index', [DashboardController::class, 'index'])->name('dashboard.index');

Route::post('/rents',[RentsController::class, 'store'])->name('rents.store');
Route::get('/rents',[RentsController::class, 'index']);

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
Route::get('/tenants', function () {
    return view('tenants.index');
})->name('tenants.index');
Route::get('/leases', function () {
    return view('leases.index');
})->name('leases.index');
Route::get('/payments', function () {
    return view('payments.index');
})->name('payments.index');
Route::get('/maintenance', function () {
    return view('maintenance.index');
    
})->name('maintenance.index');      

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ================= RENTS =================
Route::get('/rents', [RentsController::class, 'index'])->name('rents.index');
Route::post('/rents', [RentsController::class, 'store'])->name('rents.store');


Route::resource('properties', PropertyController::class);
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

Route::get('/properties', [PropertyController::class, 'index']);


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

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/', function () {
    return view('payment.index');
});

// Payment routes
Route::resource('payments', PaymentController::class);
Route::post('/payments', [PaymentController::class, 'store'])
    ->name('payments.store');


Route::get('/properties.index', [PropertyController::class, 'index']);


Route::post('/login', function () {

    $email = request('email');
    $password = request('password');

    if ($email === 'seyha.@gmail.com' && $password === '123456') {
        return redirect('/dashboard');
    }

    return back();

});




Route::resource('tenants', TenantController::class);



Route::get('/tenant', [TenantController::class, 'index'])->name('tenants.index');
Route::post('/tenant', [TenantController::class, 'store']);
Route::delete('/tenant/{tenant}', [TenantController::class, 'destroy']);



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
Route::get('/', function () {
    return view('payment.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


