<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return Inertia::render('Central/Dashboard');
    })->name('dashboard');

    Route::resource('tenants', \App\Http\Controllers\Central\TenantController::class);

    Route::post('logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
});
