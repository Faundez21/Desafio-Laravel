@extends('asignaturas.layout')

@section('content')
<div class="container">
    <h1>Asignaturas</h1>
    <a href="{{ route('asignaturas.create') }}" class="btn btn-primary">Añadir Nueva Asignatura</a>
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
            @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->id }}</td>
                    <td>{{ $asignatura->nombre }}</td>
                    <td>{{ $asignatura->codigo }}</td>
                    <td>
                        <a href="{{ route('asignaturas.show', $asignatura) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('asignaturas.edit', $asignatura) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection