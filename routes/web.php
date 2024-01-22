<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/editar-producto/{id}', [ProductosController::class, "mostrarFormularioEdicion"]);

Route::get('/crear-producto', [ProductosController::class, "mostrarFormularioCreacion"]);

Route::get('/crear-categoria', [CategoriaController::class, "formularioCrearCategoria"]);
