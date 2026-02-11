@extends('layouts.app')

@section('content')
<div class="card p-4">
<h4><i class="bi bi-folder2-open"></i> Historial de Pacientes</h4>

<table class="table table-striped mt-3">
<thead>
<tr>
<th>Nombre</th>
<th>Edad</th>
<th>Teléfono</th>
<th>Acción</th>
</tr>
</thead>

<tbody>
@foreach($pacientes as $p)
<tr>
<td>{{ $p->nombres }}</td>
<td>{{ $p->edad }}</td>
<td>{{ $p->telefono }}</td>
<td>
<a href="{{ route('consulta.create', $p->id) }}" class="btn btn-sm btn-primary">
Nueva Consulta
</a>
</td>
</tr>
@endforeach
</tbody>

</table>
</div>
@endsection
