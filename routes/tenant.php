<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', \App\Http\Controllers\Tenant\HomeController::class)->name('home');

    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Tenant/Dashboard', [
                'tenantName' => tenant('name')
            ]);
        })->name('dashboard');

        Route::resource('users', \App\Http\Controllers\Tenant\UserController::class);
        Route::resource('customers', \App\Http\Controllers\Tenant\CustomerController::class);
        Route::resource('products', \App\Http\Controllers\Tenant\ProductController::class);

        Route::resource('carts', \App\Http\Controllers\Tenant\CartController::class);

        Route::post('logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
    });
});
