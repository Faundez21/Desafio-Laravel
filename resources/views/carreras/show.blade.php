@extends('carreras.layout')

@section('content')
<div class="container">
    <h1>Detalles de Carrera</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $carrera->nombre }}</h5>
            <p class="card-text"><strong>Código:</strong> {{ $carrera->codigo }}</p>
            <p class="card-text"><strong>Facultad:</strong> {{ $carrera->facultad->nombre }}</p>
            <p class="card-text"><strong>Duración:</strong> {{ $carrera->duracion }} meses</p>
            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
