@extends('carreras.layout')

@section('content')
<div class="container">
    <h1>Carreras</h1>
    <a href="{{ route('carreras.create') }}" class="btn btn-primary mb-3">Añadir Nueva Carrera</a>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Facultad</th>
                <th>Duración (meses)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carreras as $carrera)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $carrera->nombre }}</td>
                    <td>{{ $carrera->codigo }}</td>
                    <td>{{ $carrera->facultad->nombre }}</td>
                    <td>{{ $carrera->duracion }}</td>
                    <td>
                        <a href="{{ route('carreras.show', $carrera->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('carreras.edit', $carrera->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $carreras->links() !!}
</div>
@endsection
