<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', \App\Http\Controllers\Central\DashboardController::class)->name('dashboard');

    Route::resource('tenants', \App\Http\Controllers\Central\TenantController::class);
    Route::resource('users', \App\Http\Controllers\Central\UserController::class);

    Route::post('logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
});
