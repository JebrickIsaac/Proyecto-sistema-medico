<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\CitaController;

Route::get('/farmacia', [FarmaciaController::class, 'index'])->name('farmacia.index');

Route::post('/farmacia/agregar', [FarmaciaController::class, 'agregar'])->name('farmacia.agregar');

Route::post('/farmacia/pagar', [FarmaciaController::class, 'pagar'])->name('farmacia.pagar');


Route::get('/', function () {
    return view('principal');
})->name('home');


Route::get('/cita', [CitaController::class, 'create'])->name('citas.create');
Route::post('/cita', [CitaController::class, 'store'])->name('citas.store');
Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
Route::get('/cita/atender/{id}', [CitaController::class, 'atender'])->name('citas.atender');

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





