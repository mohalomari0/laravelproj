<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\Dashboard;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('services', ServiceController::class);



Route::get('/dash', function () {
    return view('dashboard.layout.dashboard');
});
Route::get('/super_dash', function () {
    return view('dashboard.layout.superdashboard');
});

Route::resource('contacts', ContactController::class);

Route::resource('users', UserController::class);

Route::resource('appointments', AppointmentController::class);

Route::get('appointments/{id}/restore', [AppointmentController::class, 'restore'])->name('appointments.restore');
Route::delete('appointments/{id}/force-delete', [AppointmentController::class, 'forceDelete'])->name('appointments.forceDelete');

Route::get('/statistics', [StatisticsController::class, 'index']);
Route::get('/dashboard', [Dashboard::class, 'index']);