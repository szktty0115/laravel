<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
use App\Admin;
use App\General;
use App\Reservation;
use App\Tournament;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::resource('tournaments', 'TournamentController');
Route::resource('generals', 'GeneralController');
Route::resource('reservations', 'ReservationController');
Route::resource('admins', 'AdminController');
Route::resource('users', 'UserController');

Route::post('users/{id}', [RegistrationController::class, 'userUpdate'])->name('user.update');
