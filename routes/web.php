<?php
use Illuminate\Support\Facades\Route;
dareboard
use App\Http\Controllers\RentsController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\RentController;
use Symfony\Component\Mailer\Transport\RoundRobinTransport;

master
Route::get('/', function () {
    return view('welcome');
});

 dareboard
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
    
 master
