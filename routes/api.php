<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserCarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function () {
    Route::post('/users/store', 'store');
    Route::put('/users/update/{id}', 'edit');
    Route::delete('/users/delete/{id}', 'delete');
});

Route::controller(CarController::class)->group(function () {
    Route::get('/cars', 'index');
    Route::post('/cars/store', 'store');
    Route::put('/cars/update/{id}', 'edit');
    Route::delete('/cars/delete/{id}', 'delete');
});

Route::controller(UserCarController::class)->group(function () {
    Route::get('/userCars/{userId}', 'userCars');
    Route::post('/associate/{userId}/{carId}', 'associate');
    Route::delete('/disassociate/{userId}/{carId}', 'disassociate');
});
