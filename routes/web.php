<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\PendientController;
use App\Models\Pendient;

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

//Ruta para panel de Pendientes
Route::get('/pendientes', [App\Http\Controllers\PendientController::class, 'index'])->name('pendient');
Route::get('/listaPendientes', [App\Http\Controllers\PendientController::class, 'list']);
Route::post('/addPendientes', [PendientController::class, 'store']);
Route::put('/listPendientes/{id}', [PendientController::class, 'update']);
Route::get('/verPendientes', [App\Http\Controllers\PendientController::class, 'ver']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
