@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">

    {{-- HERO --}}
    <div class="bg-primary text-white rounded-4 p-5 mb-5 shadow-lg d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold">Farmacia Virtual</h1>
            <p class="lead mb-0">Compra tus medicamentos recetados con total seguridad.</p>
        </div>

        <button class="btn btn-light rounded-pill px-4"
                data-bs-toggle="offcanvas"
                data-bs-target="#carritoCanvas">
            Ver Carrito ({{ count(session('carrito', [])) }})
        </button>
    </div>

    {{-- ALERTA --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- PRODUCTOS --}}
    <div class="row g-4">
        @foreach($medicamentos as $med)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card farmacia-card h-100 border-0 shadow-sm">
                <div class="card-body text-center d-flex flex-column">

                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                         style="width:80px;height:80px;">
                        💊
                    </div>

                    <h5 class="fw-bold">{{ $med['nombre'] }}</h5>

                    <p class="text-muted small flex-grow-1">
                        {{ $med['descripcion'] }}
                    </p>

                    <h4 class="text-success fw-bold mb-3">
                        ${{ number_format($med['precio'], 2) }}
                    </h4>

                    <form action="{{ route('farmacia.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="medicamento" value="{{ $med['nombre'] }}">
                        <button class="btn btn-primary w-100 rounded-pill">
                            Agregar
                        </button>
                    </form>
                    

                </div>
                
            </div>
        </div>
        @endforeach
    </div>

</div>

<a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-arrow-left-circle me-2"></i>
                            Volver al inicio
                        </a>

{{-- CARRITO LATERAL --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="carritoCanvas">
    <div class="offcanvas-header bg-primary text-white">
        <h5 class="offcanvas-title">🛒 Tu Carrito</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        @php
            $carrito = session('carrito', []);
            $total = 0;
        @endphp

        @if(count($carrito) > 0)

            <ul class="list-group mb-3">
                @foreach($carrito as $item)
                    @php $total += $item['precio']; @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item['nombre'] }}</strong><br>
                            <small class="text-muted">${{ number_format($item['precio'],2) }}</small>
                        </div>
                    </li>
                @endforeach
            </ul>

            <h4 class="text-end fw-bold">
                Total: ${{ number_format($total,2) }}
            </h4>

            <form action="{{ route('farmacia.pagar') }}" method="POST">
                @csrf
                <button class="btn btn-success w-100 rounded-pill mt-3">
                    💳 Proceder al Pago
                </button>
            </form>

        @else
            <p class="text-muted">Tu carrito está vacío.</p>
        @endif

    </div>
</div>

{{-- ESTILOS --}}
<style>
.farmacia-card {
    transition: all 0.3s ease;
    border-radius: 20px;
}
.farmacia-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}
.bg-primary {
    background: linear-gradient(135deg, #0d6efd, #0a58ca) !important;
}
</style>

@endsection
