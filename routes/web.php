<?php

use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::resource('livros', LivroController::class);
Route::resource('autores', AutorController::class)->parameters(['autores' => 'autor']);
Route::resource('assuntos', AssuntoController::class);

Route::get('/relatorio', [RelatorioController::class, 'gerar']);