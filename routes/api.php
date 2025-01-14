<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {


    return 'okok';
});



Route::post('login', [AuthController::class, 'login']);

Route::resource('users', UserController::class);
Route::resource('flights', FlightController::class);
Route::resource('payments', PaymentController::class);
Route::resource('reservations', ReservationController::class);

Route::get('/reservations-user/{userId}', [ReservationController::class, 'indexUser']);


Route::patch('/users/update-role/{id}', [UserController::class, 'updateRole']);
Route::get('/dashboard-stats', [DashboardController::class, 'getStats']);
