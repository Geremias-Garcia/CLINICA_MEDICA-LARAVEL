<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AgendamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtendimentoController;

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('pacientes', PacienteController::class);
Route::resource('agendamentos', AgendamentoController::class);
//Route::resource('atendimentos', AtendimentoController::class);

Route::get('/facade/test', function () {
    return Permissions::test();
});

Route::get('Medico/AgendamentosPendentes', [AgendamentoController::class, 'agendamentosPendentes'])
    ->name('AgendamentosPendentes')
    ->middleware(['auth']);

Route::get('Atendimento/Home', [AtendimentoController::class, 'verProximos'])
    ->name('AtendimentosHome')
    ->middleware(['auth']);

Route::get('/Atendimentos/Create/{id}', [AtendimentoController::class, 'create'])
    ->name('atendimentos.create')
    ->middleware(['auth']);

Route::post('/atendimentos', [AtendimentoController::class, 'store'])
    ->name('atendimentos.store');


Route::post('/atendimentos', [AtendimentoController::class, 'store'])
    ->name('atendimentos.store');

Route::get('/atendimentos', [AtendimentoController::class, 'show'])
    ->name('atendimentos.show');

Route::get('Atendimento/MinhasConsultas', [AtendimentoController::class, 'minhasConsultas'])
    ->name('MinhasConsultas');

Route::get('/atendimentos/{id}/pdf', [AtendimentoController::class, 'gerarPdf'])
    ->name('atendimentos.pdf');
