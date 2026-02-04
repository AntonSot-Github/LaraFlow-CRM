<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::view('/', [PageController::class, 'start']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.login');