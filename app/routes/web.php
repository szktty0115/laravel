<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\TournamentController;

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

Route::get('applicant_list/{id}', [DisplayController::class, 'index'])->name('al.index');

Route::post('users/{id}', [RegistrationController::class, 'userUpdate'])->name('user.update');

Route::post('admins/{id}', [AdminController::class, 'adminUpdate'])->name('admin.update');

Route::get('tournament/{id}', [DisplayController::class, 'tournamentEdit'])->name('tournament.edit');
Route::post('tournament/{id}', [RegistrationController::class, 'tournamentUpdate'])->name('tournament.update');

Route::get('competition_application/{id}', [DisplayController::class, 'caindex'])->name('ca.index');
Route::post('competition_application/{id}', [RegistrationController::class, 'caUpdate'])->name('ca.update');

// Route::post('tournament/create', [TournamentController::class, 'store'])->name('tournament.create');
