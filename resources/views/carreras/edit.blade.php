@extends('carreras.layout')

@section('content')
<div class="container">
    <h1>Editar Carrera</h1>

    <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $carrera->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $carrera->codigo) }}" required>
            @error('codigo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="facultad_id" class="form-label">Facultad</label>
            <select class="form-select @error('facultad_id') is-invalid @enderror" id="facultad_id" name="facultad_id" required>
                @foreach ($facultades as $facultad)
                    <option value="{{ $facultad->id }}" {{ $facultad->id == $carrera->facultad_id ? 'selected' : '' }}>
                        {{ $facultad->nombre }}
                    </option>
                @endforeach
            </select>
            @error('facultad_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (meses)</label>
            <input type="number" class="form-control @error('duracion') is-invalid @enderror" id="duracion" name="duracion" value="{{ old('duracion', $carrera->duracion) }}" required>
            @error('duracion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
