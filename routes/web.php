<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    authController,
    appController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/', [authController::class, 'index'])->name('index');
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::post('/authenticate', [authController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [authController::class, 'register'])->name('register');
    Route::post('/signingup', [authController::class, 'signingUp'])->name('signingUp');
    Route::get('/logout', [authController::class, 'logout'])->name('logout');


Route::get('/email/verify', [authController::class, 'verify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [authController::class, 'EmailVerification'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verification-notification', [authController::class, 'verificationNotification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', [authController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [authController::class, 'recoveringPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [authController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [authController::class, 'resettPassword'])->middleware('guest')->name('password.update');

Route::middleware(['auth', 'verified'])->prefix('app')->group(function () {
    Route::get('/', [appController::class, 'index'])->name('app.index');
    Route::post('/create', [appController::class, 'creat'])->name('app.create');
    Route::get('/project/{project}', [appController::class, 'project'])->middleware('authorization')->name('app.project');
    Route::post('/create/assignment', [appController::class, 'tasks'])->name('app.assignment');
    Route::put('/update/assignment', [appController::class, 'uptasks'])->name('app.uptasks');
});