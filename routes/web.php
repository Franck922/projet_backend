<?php

use App\Http\Controllers\Admin\FlightController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('admin/dashboard', [HomeController::class,'index']);
//Route::get('admin/dashboard', [HomeController::class,'index'] )->middleware('auth','admin ');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class,'index']);
   /* Route::get('/admin/users/index', [UserController::class,'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class,'create'])->name('admin.users.create');
    Route::get('/admin/users/edit/{id}', [UserController::class,'edit'])->name('admin.users.edit');

    Route::get('/admin/flights', [FlightController::class,'index'])->name('admin.flights.index');
    Route::get('/admin/flights/create', [FlightController::class,'create'])->name('admin.flights.create');
    Route::get('/admin/flights', [FlightController::class,'store'])->name('admin.flights.store');
    Route::get('/admin/flights/{id}/edit', [FlightController::class,'edit'])->name('admin.flights.edit');
    Route::get('/admin/flights/{id}', [FlightController::class,'update'])->name('admin.flights.update');
    Route::get('/admin/flights/flights/{id}', [FlightController::class,'destroy'])->name('admin.flights.destroy');*/
});



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware('auth','admin ');

    // Gestion des utilisateurs
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/flights', [FlightController::class,'index'])->name('admin.flights.index');
Route::get('/flights/create', [FlightController::class,'create'])->name('admin.flights.create');
Route::post('/admin/flights', [FlightController::class,'store'])->name('admin.flights.store');
Route::get('/admin/flights/{id}/edit', [FlightController::class,'edit'])->name('admin.flights.edit');
Route::put('/admin/flights/{id}', [FlightController::class,'update'])->name('admin.flights.update');
Route::delete('/admin/flights/flights/{id}', [FlightController::class,'destroy'])->name('admin.flights.destroy');
Route::get('/admin/flights/search', [FlightController::class,'search'])->name('admin.flights.search');

Route::get('/reservations',[ReservationController ::class, 'index'])->name('admin.reservations.index');
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations.create');
Route::post('/admin/reservations', [ReservationController::class, 'store'])->name('admin.reservations.store');
Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
Route::get('/admin/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
Route::put('/admin/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations.update');



Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
Route::get('/admin/payments/create/{reservation}', [PaymentController::class, 'create'])->name('admin.payments.create');
Route::post('/admin/payments', [PaymentController::class, 'store'])->name('admin.payments.store');



   /* Route::post ('admin/users/index', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');*/
});




require __DIR__.'/auth.php';
