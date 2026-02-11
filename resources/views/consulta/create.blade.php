@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white rounded-top-4 p-4">
                    <h3 class="mb-0">
                        <i class="bi bi-clipboard2-pulse me-2"></i>
                        Consulta Médica
                    </h3>
                    <small>Evaluación y diagnóstico del paciente</small>
                </div>

                <div class="card-body p-5">

                    <!-- DATOS DEL PACIENTE -->
                    <h5 class="text-primary mb-4">
                        <i class="bi bi-person-badge me-2"></i>
                        Información del Paciente
                    </h5>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Nombre:</strong> {{ $paciente->nombres }}
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Edad:</strong> {{ $paciente->edad }}
                            </div>
                        </div>

                        <div class="col-md-3 mb-2">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Sexo:</strong> {{ $paciente->sexo }}
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Tipo de Sangre:</strong> {{ $paciente->tipo_sangre }}
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Alergias:</strong> {{ $paciente->alergias ?: 'Ninguna' }}
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Enfermedades Crónicas:</strong>
                                {{ $paciente->diabetes ? 'Diabetes ' : '' }}
                                {{ $paciente->hipertension ? 'Hipertensión' : '' }}
                                {{ !$paciente->diabetes && !$paciente->hipertension ? 'Ninguna' : '' }}
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- FORMULARIO DE CONSULTA -->
                    <form action="{{ route('consulta.store', $paciente->id) }}" method="POST">
                        @csrf

                        <h5 class="text-danger mb-3">
                            <i class="bi bi-heart-pulse me-2"></i>
                            Diagnóstico
                        </h5>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Enfermedad / Diagnóstico</label>
                            <select name="enfermedad" class="form-select form-select-lg" required>
                                <option value="">Seleccione una enfermedad</option>
                                <option>Gripe</option>
                                <option>Covid-19</option>
                                <option>Hipertensión</option>
                                <option>Diabetes</option>
                                <option>Gastritis</option>
                                <option>Migraña</option>
                                <option>Infección Respiratoria</option>
                                <option>Bronquitis</option>
                                <option>Alergia</option>
                                <option>Neumonía</option>
                                <option>Amigdalitis</option>
                                <option>Dermatitis</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Descripción detallada / Síntomas</label>
                            <textarea name="descripcion"
                                      rows="6"
                                      class="form-control form-control-lg"
                                      placeholder="Describa síntomas, duración, intensidad, antecedentes médicos, observaciones..."
                                      required></textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">

                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-left-circle me-2"></i>
                                Volver al inicio
                            </a>

                            <button class="btn btn-success btn-lg px-5">
                                <i class="bi bi-file-earmark-medical me-2"></i>
                                Generar Receta Médica
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

