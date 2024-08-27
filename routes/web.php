<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', function() {
    return Inertia::render('Central/Dashboard');
})->name('dashboard');

Route::resource('tenants', \App\Http\Controllers\Central\TenantController::class);
