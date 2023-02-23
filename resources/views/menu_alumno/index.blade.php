@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-light">Opciones del Menú de Alumno</h2>
                <a href="{{ route('menu_alumno.create') }}" class="btn btn-outline-info">Crear nueva opcion del menú</a>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Opcion</th>
                            <th class="w-50">Respuesta</th>
                            <th>Nextstep</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opciones as $opcion)
                            <tr>
                                <td>{{ $opcion->id }}</td>
                                <td>{{ $opcion->opcion }}</td>
                                <td class="small">{!! $opcion->respuesta !!}</td>
                                <td>{{ $opcion->nextstep }}</td>
                                <td>
                                    <a href="{{ route('menu_alumno.edit', $opcion->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('menu_alumno.destroy', $opcion->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
