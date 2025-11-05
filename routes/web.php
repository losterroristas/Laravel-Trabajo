<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Ruta principal redirige al listado de medicamento
Route::get('/', [MedicamentoController::class, 'index'])->name('inicio');

// Rutas del CRUD de Medicamento
Route::resource('medicamentos', MedicamentoController::class)->middleware('auth');

// Autenticación (login, registro, logout)
Auth::routes();

// Página de inicio después del login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Grupo protegido con autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas para Categoría
    Route::resource('categories', CategoryController::class);
    
    // Rutas para Producto
    Route::resource('products', ProductController::class);
});
