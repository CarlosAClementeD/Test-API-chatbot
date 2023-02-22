@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <h2 class="text-light mb-4">Listado de Preguntas Similares</h2>
                <h4 class="text-light mb-2">Pregunta Original: {{ $pregunta->pregunta }}</h4>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Preguntas Similares</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas_similares as $pregunta_similar)
                            <tr>
                                <td>{{ $pregunta_similar->id }}</td>
                                <td>{{ $pregunta_similar->pregunta }}</td>
                                <td>
                                        <a href="{{ route('preguntas_similares.edit', $pregunta_similar->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('preguntas_similares.destroy', $pregunta_similar->id) }}" method="POST" style="display: inline;">
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
