<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'app.home')->middleware('auth')->name('home');
Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');
