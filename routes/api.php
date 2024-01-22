<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("productos/get",[ProductosController::class,"get"]);
Route::get("categorias/get",[CategoriaController::class,"get"]);
Route::get("productos/get/{id}",[ProductosController::class,"getId"]);
Route::get("categorias/get/{id}",[CategoriaController::class,"getId"]);

Route::post("productos/crear",[ProductosController::class,"store"]);
Route::post("categoria/crear",[CategoriaController::class,"store"]);

Route::post("productos/actualizar/{id}",[ProductosController::class,"update"]);
Route::put("categoria/actualizar/{id}",[CategoriaController::class,"update"]);

Route::delete("productos/eliminar/{id}",[ProductosController::class,"eliminar"]);
Route::delete("categoria/eliminar/{id}",[CategoriaController::class,"eliminar"]);