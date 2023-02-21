@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <h2 class="text-light">Listado de Preguntas Similares</h2>
                <p>Pregunta Original: {{$pregunta->pregunta}}</p>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pregunta Similar</th>
                            <th>Pregunta Original</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas_similares as $pregunta_similar)
                            <tr>
                                <td>{{ $pregunta_similar->id }}</td>
                                <td>{{ $pregunta_similar->pregunta }}</td>
                                <td>{{ $pregunta_similar->id_preguntas }}</td>
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
