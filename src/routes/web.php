<?php

use CoreAlg\Auth\Controllers\ForgetPassword;
use CoreAlg\Auth\Controllers\LoginController;
use CoreAlg\Auth\Controllers\RegisterController;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'register'])->name('register');
    Route::post('/store', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['prefix' => 'password'], function () {
    Route::get('/email', [ForgetPassword::class, 'email'])->name('password.email');
    Route::post('/email', [ForgetPassword::class, 'sendPasswordResetLink'])->name('password.email');
    Route::get('/reset/{token}', [ResetPassword::class, 'reset'])->name('password.reset');
    Route::post('/reset/{token}', [ResetPassword::class, 'updatePassword'])->name('password.update');
});
