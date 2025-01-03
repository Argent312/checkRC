<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/lista', [HomeController::class, 'list']);
Route::get('/reset', [HomeController::class, 'reset']);
Route::put('/list/{id}', [HomeController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
