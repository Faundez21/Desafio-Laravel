@extends('facultades.layout')

@section('content')
<div class="container">
    <h1>Detalles de la Facultad</h1>

    <div class="card">
        <div class="card-header">
            Facultad: {{ $facultad->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Código:</strong> {{ $facultad->codigo }}</p>
            <p><strong>ID:</strong> {{ $facultad->id }}</p>

        </div>
    </div>

    <a href="{{ route('facultades.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
