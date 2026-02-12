@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-header bg-gradient bg-primary text-white text-center rounded-top-4 py-4">
                    <h3 class="mb-0">
                        <i class="bi bi-calendar-check me-2"></i>
                        Agendar Consulta Médica
                    </h3>
                    <small class="opacity-75">Complete la información del paciente</small>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-person-fill me-1 text-primary"></i>
                                Nombre del Paciente
                            </label>
                            <input type="text" name="nombre" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Ingrese el nombre completo" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-telephone-fill me-1 text-primary"></i>
                                Teléfono
                            </label>
                            <input type="text" name="telefono" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Ej: 0999999999">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-calendar-event me-1 text-primary"></i>
                                    Fecha
                                </label>
                                <input type="date" name="fecha" class="form-control form-control-lg rounded-3 shadow-sm" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="bi bi-clock-fill me-1 text-primary"></i>
                                    Hora
                                </label>
                                <input type="time" name="hora" class="form-control form-control-lg rounded-3 shadow-sm" required>
                            </div>
                        </div>

                        <div class="d-grid mt-3">
                            <button class="btn btn-primary btn-lg rounded-3 shadow-sm">
                                <i class="bi bi-save me-2"></i>
                                Guardar Cita
                            </button>
                        </div>

                    </form>

                </div>
                
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-arrow-left-circle me-2"></i>
                            Volver al inicio
                        </a>

                <div class="card-footer text-center bg-light rounded-bottom-4 py-3">
                    <small class="text-muted">
                        Sistema Médico Web © {{ date('Y') }}
                    </small>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
