<?php

use CoreAlg\Auth\Http\Controllers\Auth\AccountActivationController;
use CoreAlg\Auth\Http\Controllers\Auth\ForgetPasswordController;
use CoreAlg\Auth\Http\Controllers\Auth\LoginController;
use CoreAlg\Auth\Http\Controllers\Auth\RegisterController;
use CoreAlg\Auth\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'register'])->name('register');
    Route::post('/store', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['prefix' => 'password'], function () {
    Route::get('/email', [ForgetPasswordController::class, 'email'])->name('password.request');
    Route::post('/email', [ForgetPasswordController::class, 'sendPasswordResetLink'])->name('password.sendResetLink');
    Route::get('/reset/{token}', [ResetPasswordController::class, 'reset'])->name('password.reset');
    Route::post('/reset/{token}', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
});

Route::get('active-account/{token}', [AccountActivationController::class, 'activeAccount'])->name('activeAccount');
