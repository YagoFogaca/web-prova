<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ExamsController;
use Illuminate\Support\Facades\Route;

Route::controller(TeachersController::class)->group(function () {
    Route::get('/teachers/login', 'login')->name('teachers.login');
    Route::post('/teachers/auth', 'auth')->name('teachers.auth');

    Route::get('/teachers/logout', 'logout')->middleware('auth.teachers:teacher')->name('teachers.logout');
});

Route::controller(PlatformController::class)->group(function () {
    Route::get('/platform', 'index')->middleware('auth.teachers:teacher')->name('platform.index');
});

Route::controller(ExamsController::class)->group(function () {
    // Visualizar todas as provas criar pelo professor
    Route::get('/exams', 'index')->middleware('auth.teachers:teacher')->name('exams.index');
    // Página para criar provas
    Route::get('/exams/create', 'create')->middleware('auth.teachers:teacher')->name('exams.create');
    // Visualizar uma prova
    Route::get('/exams/{id}', 'show')->middleware('auth.teachers:teacher')->name('exams.show');
    // Criar prova
    Route::post('/exams', 'store')->middleware('auth.teachers:teacher')->name('exams.store');
});

Route::controller(QuestionsController::class)->group(function () {
    // Visualizar todas as provas criar pelo professor
    // Route::get('/exams', 'index')->middleware('auth.teachers:teacher')->name('exams.index');
    // Página para criar questões
    Route::get('/exam/{exam}/questions/create', 'create')->middleware('auth.teachers:teacher')->name('questions.create');
    // // Visualizar uma prova
    // Route::get('/exams/{exam}', 'show')->middleware('auth.teachers:teacher')->name('exams.show');
    // // Criar prova
    Route::post('/questions', 'store')->middleware('auth.teachers:teacher')->name('questions.store');
});
