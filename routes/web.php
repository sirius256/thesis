<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('public.home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('admin.user.dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('hasUserRole')->group(function () {
        Route::get('/profile/view', [ProfileController::class, 'view'])->name('administration.user.profile.view');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware('hasModeratorRole')->group(function () {

    });

    Route::middleware('hasAdminRole')->group(function () {

    });
});

require __DIR__.'/auth.php';
