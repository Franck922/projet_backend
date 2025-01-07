<?php

use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {


return 'okok';

 });

Route::resource('users', UserController::class);
Route::resource('flights', FlightController::class);
Route::resource('payments', PaymentController::class);
Route::resource('reservations', ReservationController::class);


