<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'handle']);

// グルーピングする必要あり
Route::get('/admin/users', [IndexController::class, 'index']);

Route::get('/admin/users/{id}/edit', [EditController::class, 'show'])->whereUuid('id');
Route::post('/admin/users/{id}/edit', [EditController::class, 'store'])->whereUuid('id');
