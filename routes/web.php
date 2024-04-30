<?php

use Illuminate\Support\Facades\Route;
use App\Models\Reservation;
use App\Models\Adresse;

use App\Http\Controllers\AdresseController;
use App\Http\Controllers\ReservationController;
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/aide', function () {
        return view('pages/aide');
    })->name('aide');
    Route::get('/reservation', function () {
        $userReservations = Reservation::where('user_id', auth()->id())->get();
        return view('pages/reservation', compact('userReservations'));
    })->name('reservation');
    Route::get('/informations', function () {
        return view('pages/informations');
    })->name('informations');
    Route::get('/adresses', function () {
        $userAdresses = Adresse::where('user_id', auth()->id())->get();
        return view('pages/adresses', compact('userAdresses'));
    })->name('adresses');

    Route::resource('user', 'App\Http\Controllers\UserController');

    Route::post('/adresses', [AdresseController::class, 'store'])->name('adresses.store');
    Route::delete('/adresses/{id}', [AdresseController::class, 'destroy'])->name('adresses.destroy');


    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::get('/adresses/{id}/edit', [AdresseController::class, 'edit'])->name('adresses.edit');
    Route::put('/adresses/{id}', [AdresseController::class, 'update'])->name('adresses.update');



});
