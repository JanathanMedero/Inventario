<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Auth::routes([
    'reset'     => false,
    'verify'    => false,
    'register'  => false
]);

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
