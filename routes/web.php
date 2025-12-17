<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RetiroController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/retiros', [RetiroController::class, 'index'])->name('retiros.index');
Route::get('/retiros/{usuario}', [RetiroController::class, 'create'])->name('retiros.create');
Route::post('/retiros', [RetiroController::class, 'store'])->name('retiros.store');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

// Ver saldo e historial de retiros de un usuario
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])
    ->name('usuarios.show');
/*
// Formulario para realizar retiro
Route::get('/retiro/{id}', [RetiroController::class, 'create'])
    ->name('retiros.create');

// Guardar retiro
Route::post('/retiro', [RetiroController::class, 'store'])
->name('retiros.store');
*/
// Reporte general de retiros
Route::get('/reporte-retiros', [ReporteController::class, 'reporteRetiros'])
    ->name('reporte.retiros');

