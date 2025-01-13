<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckController;

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

//Ruta para panel de Eventos
Route::get('/eventos', [App\Http\Controllers\CheckController::class, 'index'])->name('event');
Route::get('/listaEventos', [CheckController::class, 'list']);
Route::post('/addEvent', [CheckController::class, 'addEvent']);
Route::post('/addEventos', [CheckController::class, 'store']);
Route::put('/listEvento/{id}', [CheckController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendientes', [App\Http\Controllers\HomeController::class, 'pendient'])->name('event');
