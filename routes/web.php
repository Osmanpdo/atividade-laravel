<?php

use App\Http\Controllers\AtendimentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServicoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::resource('clientes', ClienteController::class);
Route::resource('atendimentos', AtendimentoController::class);
Route::resource('compras', CompraController::class);
Route::resource('especies', EspecieController::class);
Route::resource('pets', PetController::class);
Route::resource('servicos', ServicoController::class);
