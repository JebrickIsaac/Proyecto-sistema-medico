@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- ALERTA DE ÉXITO --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-primary text-white rounded-top-4 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">
                    <i class="bi bi-calendar-week me-2"></i>
                    Lista de Citas Agendadas
                </h3>
                <span class="badge bg-light text-primary fs-6">
                    {{ $citas->count() }} Citas
                </span>
            </div>
        </div>

        <div class="card-body p-4">

            @if($citas->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-calendar-x display-4 text-muted"></i>
                    <h5 class="mt-3 text-muted">No hay citas registradas</h5>
                    <p class="text-muted">Las citas aparecerán aquí cuando sean agendadas.</p>
                </div>
            @else

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th><i class="bi bi-person-fill me-1"></i> Paciente</th>
                            <th><i class="bi bi-calendar-event me-1"></i> Fecha</th>
                            <th><i class="bi bi-clock me-1"></i> Hora</th>
                            <th><i class="bi bi-info-circle me-1"></i> Estado</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                        <tr class="shadow-sm rounded-3">
                            <td class="fw-semibold">
                                {{ $cita->nombre }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                            </td>
                            <td>
                                {{ $cita->hora }}
                            </td>
                            <td>
                                @if($cita->estado == 'Pendiente')
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        <i class="bi bi-hourglass-split me-1"></i>
                                        Pendiente
                                    </span>
                                @else
                                    <span class="badge bg-success px-3 py-2">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Atendida
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($cita->estado == 'Pendiente')
                                    <a href="{{ route('paciente.store', $cita->id) }}" 
                                       class="btn btn-primary btn-sm rounded-3 shadow-sm">
                                        <i class="bi bi-stethoscope me-1"></i>
                                        Atender
                                    </a>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif

        </div>

        <div class="card-footer bg-light text-center rounded-bottom-4 py-3">
            <small class="text-muted">
                Sistema Médico Web © {{ date('Y') }}
            </small>
        </div>

    </div>

</div>
@endsection
