<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;
use Symfony\Component\Mailer\Transport\RoundRobinTransport;

Route::get('/', function () {
    return view('welcome');
});

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
    
