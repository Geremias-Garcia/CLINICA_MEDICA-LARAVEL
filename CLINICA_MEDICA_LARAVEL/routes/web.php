<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('Login/Login');
});
Route::resource('/pacientes', PacienteController::class);
Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');

Route::get('/Login', [LoginController::class, 'showLoginForm'])->name('login');

