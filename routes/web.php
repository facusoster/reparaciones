<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('session.auth')->group(function () {
    Route::resource('reparaciones', ReparacionController::class);
});