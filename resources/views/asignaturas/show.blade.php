@extends('asignaturas.layout')

@section('content')
<div class="container">
    <h1>Detalles de la Asignatura</h1>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <p>{{ $asignatura->nombre }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">Código</label>
        <p>{{ $asignatura->codigo }}</p>
    </div>

    <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection