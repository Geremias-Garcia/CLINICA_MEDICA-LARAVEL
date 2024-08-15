<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/pacientes', PacienteController::class);
//Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
//Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');
//Route::post('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
//Route::get('/pacientes/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');

