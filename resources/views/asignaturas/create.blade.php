@extends('asignaturas.layout')

@section('content')
<div class="container">
    <h1>Añadir Nueva Asignatura</h1>

    <form action="{{ route('asignaturas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo') }}" required>
            @error('codigo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="creditos" class="form-label">Créditos</label>
            <input type="number" class="form-control @error('creditos') is-invalid @enderror" id="creditos" name="creditos" value="{{ old('creditos') }}" required>
            @error('creditos')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="carrera_id" class="form-label">Carrera</label>
            <select class="form-control @error('carrera_id') is-invalid @enderror" id="carrera_id" name="carrera_id" required>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>{{ $carrera->nombre }}</option>
                @endforeach
            </select>
            @error('carrera_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
