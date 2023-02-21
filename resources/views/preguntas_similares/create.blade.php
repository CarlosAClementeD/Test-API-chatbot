


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                Agregar pregunta similar para "{{ $pregunta->pregunta }}"
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('preguntas_similares.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="pregunta">Pregunta similar</label>
                        <input type="text" class="form-control" name="pregunta" id="pregunta" required>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="id_preguntas" id="pregunta" value="{{ $pregunta->id }}" hidden required>

                    </div>
                    <button type="submit" class="btn btn-primary">Agregar pregunta similar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
