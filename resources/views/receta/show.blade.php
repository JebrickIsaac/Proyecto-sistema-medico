@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4">

                <!-- HEADER -->
                <div class="card-header bg-primary text-white rounded-top-4 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">
                                <i class="bi bi-file-earmark-medical me-2"></i>
                                Receta Médica
                            </h3>
                            <small>Documento oficial de atención médica</small>
                        </div>
                        <div class="text-end">
                            <small>Fecha:</small><br>
                            <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body p-5">

                    <!-- DATOS DEL PACIENTE -->
                    <h5 class="text-primary mb-4">
                        <i class="bi bi-person-badge me-2"></i>
                        Datos del Paciente
                    </h5>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Nombre:</strong><br>
                                {{ $consulta->paciente->nombres }}
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Edad:</strong><br>
                                {{ $consulta->paciente->edad }}
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Sexo:</strong><br>
                                {{ $consulta->paciente->sexo }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Tipo de sangre:</strong><br>
                                {{ $consulta->paciente->tipo_sangre }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 bg-light rounded-3 shadow-sm">
                                <strong>Alergias:</strong><br>
                                {{ $consulta->paciente->alergias ?? 'Ninguna' }}
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- DIAGNÓSTICO -->
                    <h5 class="text-danger mb-3">
                        <i class="bi bi-heart-pulse me-2"></i>
                        Diagnóstico
                    </h5>

                    <div class="mb-4">
                        <strong>Enfermedad detectada:</strong>
                        <div class="border rounded-3 p-3 mt-2 bg-light">
                            {{ $consulta->enfermedad }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <strong>Descripción clínica:</strong>
                        <div class="border rounded-3 p-4 mt-2 bg-light">
                            {{ $consulta->descripcion }}
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- TRATAMIENTO -->
                    <h5 class="text-success mb-3">
                        <i class="bi bi-capsule-pill me-2"></i>
                        Tratamiento e Indicaciones
                    </h5>

                    <div class="mb-4">
                        <strong>Indicaciones médicas:</strong>
                        <div class="border rounded-3 p-4 mt-2 bg-success bg-opacity-10">
                            {{ $consulta->tratamiento }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <strong>Medicamentos recetados:</strong>
                        <div class="border rounded-3 p-4 mt-2 bg-warning bg-opacity-10">
                            {{ $consulta->medicamentos }}
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- FIRMA -->
                    <div class="text-end mb-4">
                        <p class="mb-0">______________________________</p>
                        <small class="text-muted">Firma y sello del médico</small>
                    </div>

                    <!-- BOTONES -->
                    <div class="d-flex justify-content-between mt-4">

                        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-arrow-left-circle me-2"></i>
                            Volver al inicio
                        </a>

                        <div>
                            <a href="{{ route('paciente.index') }}"
                               class="btn btn-primary btn-lg me-2">
                                <i class="bi bi-person-plus me-2"></i>
                                Nuevo paciente
                            </a>

                            <a href="{{ route('receta.pdf', $consulta->id) }}"
                               class="btn btn-danger btn-lg">
                                <i class="bi bi-file-earmark-pdf me-2"></i>
                                Descargar PDF
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

