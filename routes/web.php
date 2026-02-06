<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

//Admin panel
Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

//Client page for authorized user only
Route::middleware('auth')->group(function () {

    //Show page
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

    //Create client form-page
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

    //Save client to DB
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

    //Edit client data
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

    //Save edition data
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

});


