<?php

use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class)->except('index');
    Route::post('responses/{ticket}', [ResponseController::class, 'store'])->name('responses.store');
    Route::put('tickets/{ticket}/close', [ResponseController::class, 'close'])->name('tickets.close');
});

