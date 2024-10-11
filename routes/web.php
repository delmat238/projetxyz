<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignupAccountController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TermeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'app.home')->middleware('auth')->name('home');

Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

//Route::get('/terme', [TermeController::class, 'terme'])->middleware('guest')->name('terme');

//Route::get('/subscribe', [SubscribeController::class, 'signup'])->middleware('guest')->name('subscribe');
//Route::post('/handle-form', [SubscribeController::class, 'handleTerms'])->middleware('guest');

Route::get('/signup-account{InvitationCode:code}', [SignupAccountController::class, 'signup'])->middleware('guest')->name('getSignup-account');
Route::post('/signup-account', [SignupAccountController::class, 'postSignup'])->middleware('guest')->name('signup-account');

Route::post('/create-account{{InvitationCode:code}}', [SignupAccountController::class, 'createUser'])->middleware('guest')->name('create-account');
