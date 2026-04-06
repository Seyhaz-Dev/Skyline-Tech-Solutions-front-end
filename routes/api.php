<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\LeaseController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\MaintenanceRequestController;
use App\Http\Controllers\Api\AdminController;


Route::apiResource('properties', PropertyController::class);
Route::apiResource('units', UnitController::class);
Route::apiResource('tenants', TenantController::class);
Route::apiResource('leases', LeaseController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('maintenance-requests', MaintenanceRequestController::class);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
