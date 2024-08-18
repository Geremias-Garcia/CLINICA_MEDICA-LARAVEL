<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/pacientes', PacienteController::class);
Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');

