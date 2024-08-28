@extends('facultades.layout')

@section('content')
<div class="container">
    <h1>Facultades</h1>
    <a href="{{ route('facultades.create') }}" class="btn btn-primary">Añadir Nueva Facultad</a>
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection