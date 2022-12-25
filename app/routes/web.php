<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;


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
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController');
    Route::resource('tournaments', 'TournamentController');
    Route::get('competition_application/{id}', [DisplayController::class, 'caindex'])->name('ca.index');
    Route::post('competition_application/{id}', [RegistrationController::class, 'caUpdate'])->name('ca.update');
    Route::post('/ajax', [TournamentController::class, 'ajax'])->name('ajax');
    Route::post('users/{id}', [RegistrationController::class, 'reservationUserDelete'])->name('reservation.user.delete');
    Route::get('user/{id}/edit', [DisplayController::class, 'userEdit'])->name('user.edit');
    Route::post('user/{id}/edit', [RegistrationController::class, 'userStore'])->name('user.store');
});

Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::resource('generals', 'GeneralController');
    Route::resource('reservations', 'ReservationController');
    Route::resource('admins', 'AdminController');


    Route::post('admins/{id}', [AdminController::class, 'adminUpdate'])->name('admin.update');

    Route::get('applicant_list/{id}', [DisplayController::class, 'index'])->name('al.index');

    Route::post('applicant_list/{id}', [RegistrationController::class, 'reservationDelete'])->name('reservation.delete');

    Route::get('tournament/{id}', [DisplayController::class, 'tournamentEdit'])->name('tournament.edit');
    Route::post('tournament/{id}', [RegistrationController::class, 'tournamentUpdate'])->name('tournament.update');

    Route::get('tournament/{id}/create', [DisplayController::class, 'tournamentCreate'])->name('tournament.create');
    Route::post('tournament/{id}/create', [RegistrationController::class, 'tournamentCreate'])->name('tournament.create');
});
