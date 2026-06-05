<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('reparaciones', ReparacionController::class);