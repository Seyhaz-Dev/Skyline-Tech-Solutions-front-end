<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RentController;
use Symfony\Component\Mailer\Transport\RoundRobinTransport;



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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/hello', function () {
    return view('hello');
});
Route::get('/header', function () {
    return view('layouts.header');
});
Route::get('/rent', [RentController::class, 'index']);

Route::get('/properties', [PropertiesController::class, 'index']);


