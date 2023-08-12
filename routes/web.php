<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\UsageCategory\CreateController as UsageCategoryCreateController;
use App\Http\Controllers\Admin\UsageCategory\IndexController as UsageCategoryIndexController;
use App\Http\Controllers\Admin\User\DeleteController;
use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'handle']);
});

Route::middleware(['auth', 'activity'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'handle']);

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/users', [IndexController::class, 'index']);

        Route::get('/admin/users/{id}/edit', [EditController::class, 'show'])->whereUuid('id');
        Route::post('/admin/users/{id}/edit', [EditController::class, 'store'])->whereUuid('id');

        Route::post('/admin/users/{id}/delete', [DeleteController::class, 'delete'])->whereUuid('id');

        Route::get('/admin/usage-categories', [UsageCategoryIndexController::class, 'index']);

        Route::get('/admin/usage-categories/create', [UsageCategoryCreateController::class, 'create']);
        Route::post('/admin/usage-categories', [UsageCategoryCreateController::class, 'store']);
    });
});
