<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;

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

Route::post('admins/{id}', [AdminController::class, 'adminUpdate'])->name('admin.update');
