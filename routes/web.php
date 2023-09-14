<?php

use App\Http\Controllers\TeachersController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(TeachersController::class)->group(function () {
    Route::get('/teachers/login', 'login')->name('teachers.login');
    Route::post('/teachers/auth', 'auth')->name('teachers.auth');

    Route::get('/teachers/logout', 'logout')->middleware('auth.teachers:teacher')->name('teachers.logout');
});

Route::controller(PlatformController::class)->group(function () {
    Route::get('/platform', 'index')->middleware('auth.teachers:teacher')->name('platform.index');
});
