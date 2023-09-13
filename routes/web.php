<?php

use App\Http\Controllers\TeachersController;
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
});
