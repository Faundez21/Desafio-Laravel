@extends('facultades.layout')


@section('content')
<div class="container">
    <h1>Detalles de la Facultad</h1>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <p>{{ $facultad->nombre }}</p>
    </div>

    <div class="mb-3">
        <label class="form-label">Código</label>
        <p>{{ $facultad->codigo }}</p>
    </div>

    <a href="{{ route('facultades.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection