<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DrawController;
use App\Http\Controllers\ClaimController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class)->except(['show']);

    Route::resource('tickets', TicketController::class);
    Route::post('tickets/generate', [TicketController::class, 'generate'])->name('tickets.generate');

    Route::resource('draws', DrawController::class);
    Route::post('draws/{draw}/conduct', [DrawController::class, 'conduct'])->name('draws.conduct');

    Route::post('claims/{ticket}', [ClaimController::class, 'claim'])->name('claims.store');
});
