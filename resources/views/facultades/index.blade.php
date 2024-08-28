@extends('facultades.layout')

@section('content')
<div class="container">
    <h1>Facultades</h1>
    <a href="{{ route('facultades.create') }}" class="btn btn-primary">Añadir Nueva Facultad</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facultades as $facultad)
                <tr>
                    <td>{{ $facultad->id }}</td>
                    <td>{{ $facultad->nombre }}</td>
                    <td>{{ $facultad->codigo }}</td>
                    <td>
                        <a href="{{ route('facultades.show', $facultad) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('facultades.edit', $facultad) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('facultades.destroy', $facultad) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta facultad?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
