@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-light">Listado de Preguntas</h2>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pregunta Original</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas as $pregunta)
                            <tr>
                                <td>{{ $pregunta->id }}</td>
                                <td>{{ $pregunta->pregunta }}</td>
                                <td>
                                    <a href="{{ route('preguntas_similares.show', ['id' => $pregunta->id]) }}" class="btn btn-primary">Ver preguntas similares</a>
                                    <a href="{{ route('preguntas_similares.create', ['id' => $pregunta->id]) }}" class="btn btn-success">Agregar pregunta similar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
