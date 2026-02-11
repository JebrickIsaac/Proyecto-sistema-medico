@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white rounded-top-4 p-4">
                    <h3 class="mb-0">
                        <i class="bi bi-clipboard2-pulse me-2"></i>
                        Registro de Paciente
                    </h3>
                    <small>Ingrese la información médica del paciente</small>
                </div>

                <div class="card-body p-5">

                    <form action="{{ route('paciente.store') }}" method="POST">
                        @csrf

                        <!-- DATOS PERSONALES -->
                        <h5 class="mb-3 text-primary">
                            <i class="bi bi-person-vcard me-2"></i>Datos Personales
                        </h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombres</label>
                                <input class="form-control form-control-lg" name="nombres" required>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Edad</label>
                                <input type="number" class="form-control form-control-lg" name="edad" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Sexo</label>
                                <select class="form-select form-select-lg" name="sexo">
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Estado Civil</label>
                                <select class="form-select form-select-lg" name="estado_civil" required>
                                    <option value="">Seleccione</option>
                                    <option>Soltero</option>
                                    <option>Casado</option>
                                    <option>Divorciado</option>
                                    <option>Viudo</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Teléfono</label>
                                <input class="form-control form-control-lg" name="telefono">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Correo</label>
                                <input type="email" class="form-control form-control-lg" name="correo">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Dirección</label>
                            <input class="form-control form-control-lg" name="direccion">
                        </div>

                        <hr class="my-4">

                        <!-- DATOS MÉDICOS -->
                        <h5 class="mb-3 text-danger">
                            <i class="bi bi-heart-pulse me-2"></i>Datos Médicos
                        </h5>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Tipo de Sangre</label>
                                <input class="form-control form-control-lg" name="tipo_sangre">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Diabetes</label>
                                <select class="form-select form-select-lg" name="diabetes">
                                    <option value="0">Sin diabetes</option>
                                    <option value="1">Con diabetes</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Hipertensión</label>
                                <select class="form-select form-select-lg" name="hipertension">
                                    <option value="0">Sin hipertensión</option>
                                    <option value="1">Con hipertensión</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alergias</label>
                            <textarea class="form-control form-control-lg" name="alergias" rows="4"
                                placeholder="Describa alergias conocidas..."></textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-left-circle me-2"></i>Volver al inicio
                            </a>

                            <button class="btn btn-success btn-lg px-5">
                                <i class="bi bi-save me-2"></i>Guardar Paciente
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
