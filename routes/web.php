<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [App\Http\Controllers\ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}', [App\Http\Controllers\ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{id}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('clientes.destroy');

Route::get('/proveedores/productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('productos.index');
Route::get('/proveedores/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::post('/proveedores/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
Route::get('/proveedores/productos/{id}', [App\Http\Controllers\ProductosController::class, 'show'])->name('productos.show');
Route::get('/proveedores/productos/{id}/edit', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/proveedores/productos/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update');
Route::delete('/proveedores/productos/{id}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy');

Route::get('/trabajadores', [App\Http\Controllers\TrabajadoresController::class, 'index'])->name('trabajadores.index');
Route::get('/trabajadores/create', [App\Http\Controllers\TrabajadoresController::class, 'create'])->name('trabajadores.create');
Route::post('/trabajadores', [App\Http\Controllers\TrabajadoresController::class, 'store'])->name('trabajadores.store');
Route::get('/trabajadores/{id}', [App\Http\Controllers\TrabajadoresController::class, 'show'])->name('trabajadores.show');
Route::get('/trabajadores/{id}/edit', [App\Http\Controllers\TrabajadoresController::class, 'edit'])->name('trabajadores.edit');
Route::put('/trabajadores/{id}', [App\Http\Controllers\TrabajadoresController::class, 'update'])->name('trabajadores.update');
Route::delete('/trabajadores/{id}', [App\Http\Controllers\TrabajadoresController::class, 'destroy'])->name('trabajadores.destroy');

Route::get('/nominas', [App\Http\Controllers\NominasController::class, 'index'])->name('nominas.index');
Route::get('/nominas/create', [App\Http\Controllers\NominasController::class, 'create'])->name('nominas.create');
Route::post('/nominas', [App\Http\Controllers\NominasController::class, 'store'])->name('nominas.store');
Route::get('/nominas/{id}', [App\Http\Controllers\NominasController::class, 'show'])->name('nominas.show');
Route::get('/nominas/{id}/edit', [App\Http\Controllers\NominasController::class, 'edit'])->name('nominas.edit');
Route::put('/nominas/{id}', [App\Http\Controllers\NominasController::class, 'update'])->name('nominas.update');
Route::delete('/nominas/{id}', [App\Http\Controllers\NominasController::class, 'destroy'])->name('nominas.destroy');

// Proveedores
Route::get('/proveedores', [App\Http\Controllers\ProveedoresController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [App\Http\Controllers\ProveedoresController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [App\Http\Controllers\ProveedoresController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{id}', [App\Http\Controllers\ProveedoresController::class, 'show'])->name('proveedores.show');
Route::get('/proveedores/{id}/edit', [App\Http\Controllers\ProveedoresController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{id}', [App\Http\Controllers\ProveedoresController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{id}', [App\Http\Controllers\ProveedoresController::class, 'destroy'])->name('proveedores.destroy');
