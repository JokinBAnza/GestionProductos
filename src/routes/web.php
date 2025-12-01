<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProveedorController;


Route::get('/', function () {
    $Usuario= App\Models\Usuario::first();
    return view('welcome', compact('Usuario'));
});

Route::resource('categories', CategoriaController::class);
Route::resource('products', ProductoController::class);
Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen.index');

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');

Route::resource('proveedors', ProveedorController::class);


