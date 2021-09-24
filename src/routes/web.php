<?php

use CoreAlg\Auth\App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('auth.authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');