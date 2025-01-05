<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/lista', [HomeController::class, 'list']);
Route::get('/reset', [HomeController::class, 'reset']);
Route::put('/list/{id}', [HomeController::class, 'update']);

//Ruta para panel de administrador
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::put('/edit/{id}', [HomeController::class, 'edit']);
Route::post('/add', [HomeController::class, 'add']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
