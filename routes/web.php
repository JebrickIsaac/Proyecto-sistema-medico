<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmaciaController;

Route::get('/farmacia', [FarmaciaController::class, 'index'])->name('farmacia.index');

Route::post('/farmacia/agregar', [FarmaciaController::class, 'agregar'])->name('farmacia.agregar');

Route::get('/', function () {
    return view('principal');
})->name('home');


Route::get('/paciente', [MedicoController::class, 'index'])
    ->name('paciente.index');

Route::post('/paciente', [MedicoController::class, 'storePaciente'])
    ->name('paciente.store');

Route::get('/consulta/{id}', [MedicoController::class, 'createConsulta'])
    ->name('consulta.create');

Route::post('/consulta/{id}', [MedicoController::class, 'storeConsulta'])
    ->name('consulta.store');

Route::get('/receta/{id}', [MedicoController::class, 'showReceta'])
    ->name('receta.show');

Route::get('/receta/pdf/{id}', [MedicoController::class, 'pdf'])
    ->name('receta.pdf');

Route::get('/historial', [MedicoController::class, 'historial'])
    ->name('historial');





