<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTicketController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PerformerController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Events
    Route::resource('/events', EventController::class)->only('index','show');

    // Buy ticket
    Route::resource('events.ticket', EventTicketController::class)->only('store');

    // Performers
    Route::resource('/performers', PerformerController::class)->only('index','show');

    // Locations
    Route::resource('/locations', LocationController::class)->only('index','show');

    // My Tickets
    Route::resource('/tickets', TicketController::class)->only('index');
});

require __DIR__.'/auth.php';
