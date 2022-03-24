<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('empresas', EmpresaController::class);
Route::get('empresas_ajax', [EmpresaController::class, 'ajax'])->name('empresas.ajax');


Route::resource('unidades', UnidadeController::class);
Route::get('unidades_ajax', [UnidadeController::class, 'ajax'])->name('unidades.ajax');

