<?php

use Syscodes\Components\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedUserController;
use App\Http\Controllers\PasswordResetLinkController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register auth routes for your application. This  is 
| the group which contains the "auth" middleware. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
                ->name('register');
    
    Route::post('/register', [RegisteredUserController::class, 'store']);    

    Route::get('/login', [AuthenticatedUserController::class, 'create'])
               ->name('login');
    
    Route::post('/login', [AuthenticatedUserController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
               ->name('password.request');
    
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
               ->name('password.email');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedUserController::class, 'destroy'])
                ->name('logout');
});