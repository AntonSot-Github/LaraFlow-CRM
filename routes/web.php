<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'start'])->name('start');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard <br> <a href=" . route('start') . ">Start</a><br>";
    });
});

//logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
