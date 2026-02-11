@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card p-4">

<h4 class="text-center mb-3">
<i class="bi bi-person-badge"></i> Acceso Médico
</h4>

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="/login">
@csrf
<input class="form-control mb-3" name="email" placeholder="Correo">
<input type="password" class="form-control mb-3" name="password" placeholder="Contraseña">
<button class="btn btn-primary w-100">Ingresar</button>
</form>

</div>
</div>
</div>
@endsection
