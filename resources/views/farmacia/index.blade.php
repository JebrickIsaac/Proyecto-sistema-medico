@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">

    {{-- HERO SECTION --}}
    <div class="bg-primary text-white rounded-4 p-5 mb-5 shadow-lg">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="fw-bold">Farmacia Virtual</h1>
                <p class="lead mb-0">
                    Compra tus medicamentos recetados con total seguridad y confianza.
                </p>
            </div>
            <div class="col-md-4 text-end">
                <div class="bg-white text-primary rounded-3 p-3 shadow-sm d-inline-block">
                    <h5 class="mb-0">
                        🛒 Carrito
                    </h5>
                    <h3 class="fw-bold mb-0">
                        {{ count(session('carrito', [])) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- ALERTA --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- BARRA DE BUSQUEDA --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <input type="text" class="form-control form-control-lg"
                   placeholder="🔎 Buscar medicamento...">
        </div>
    </div>

    {{-- LISTADO DE PRODUCTOS --}}
    <div class="row g-4">

        @foreach($medicamentos as $med)
        <div class="col-md-6 col-lg-4 col-xl-3">

            <div class="card farmacia-card h-100 border-0 shadow-sm">

                <div class="card-body d-flex flex-column">

                    <div class="mb-3 text-center">
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto"
                             style="width:80px;height:80px;">
                            💊
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark text-center">
                        {{ $med['nombre'] }}
                    </h5>

                    <p class="text-muted small text-center flex-grow-1">
                        {{ $med['descripcion'] }}
                    </p>

                    <h4 class="text-success fw-bold text-center mb-3">
                        ${{ number_format($med['precio'], 2) }}
                    </h4>

                    <form action="{{ route('farmacia.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="medicamento" value="{{ $med['nombre'] }}">
                        <button class="btn btn-primary w-100 rounded-pill">
                            Agregar al carrito
                        </button>
                    </form>

                </div>
            </div>

        </div>
        @endforeach

    </div>

    {{-- BOTON VOLVER --}}
    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill px-4">
            Volver al inicio
        </a>
    </div>

</div>

{{-- ESTILOS PERSONALIZADOS --}}
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
