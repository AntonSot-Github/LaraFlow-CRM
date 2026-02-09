<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Can;

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

    Route::prefix('clients')->group(function(){
        //Show page
        Route::get('/', [ClientController::class, 'index'])->name('clients.index');

        //Create client form-page
        Route::get('/create', [ClientController::class, 'create'])->name('clients.create');

        //Save client to DB
        Route::post('/', [ClientController::class, 'store'])->name('clients.store');

        //Edit client data
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

        //Save edition data
        Route::put('/{client}', [ClientController::class, 'update'])->name('clients.update');

        //Delete client from DB
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

        //Show the client
        Route::get('/{client}/show', [ClientController::class, 'show'])->name('client.show');

        //Return to deals list page
        Route::get('/{client}/deals', [DealController::class, 'index'])->name('clients.deals.index');

        //Show the deal
        Route::get('/{client}/deal/{deal}', [DealController::class, 'show'])->name('clients.deal.show');

        //Form page for a new deal create
        Route::get('/{client}/deals/create', [DealController::class, 'create'])->name('clients.deals.create');

        //Saving new deal to DB
        Route::post('{client}/deals', [DealController::class, 'store'])->name('clients.deals.store');

        //Edition choosen deal
        Route::get('/{client}/deals/{deal}/update', [DealController::class, 'edit'])->name('client.deals.edit');

        //Save changed current deal
        Route::put('/{client}/deals/{deal}', [DealController::class, 'update'])->name('client.deals.update');

        //Delete current deal
        Route::delete('/{client}/deals/{deal}', [DealController::class, 'destroy'])->name('clients.deals.destroy');
        
    });
});

//Save comment
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

//Save task
Route::post('/clients/{client}/deals/{deal}/tasks', [TaskController::class, 'store'])->middleware('auth')->name('task.store');


