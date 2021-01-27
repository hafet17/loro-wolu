<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, DashboardController, UserController};
use App\Http\Controllers\Band\BandController;

Auth::routes();
Route::get('/', HomeController::class)->name('home');

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('user', UserController::class);
