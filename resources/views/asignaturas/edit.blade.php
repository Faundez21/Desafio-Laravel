@extends('asignaturas.layout')

@section('content')
<div class="container">
    <h1>Editar Asignatura</h1>

    <form action="{{ route('asignaturas.update', $asignatura) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $asignatura->nombre) }}" required>
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="codigo" class="form-label">Código</label>
    <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $asignatura->codigo) }}" required>
    @error('codigo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection