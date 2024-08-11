<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');

