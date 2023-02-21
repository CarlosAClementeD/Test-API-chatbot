@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-light">Editar Pregunta Similar</h2>
                <form action="{{ route('preguntas_similares.update', $pregunta_similar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pregunta">Pregunta Similar</label>
                        <input type="text" name="pregunta" class="form-control" id="pregunta" value="{{ $pregunta_similar->pregunta }}">
                    </div>
                    <div class="form-group mb-4">
                        <label for="pregunta_original">Pregunta Original</label>
                        <select name="pregunta_original" id="pregunta_original" class="form-control">
                            @foreach ($preguntas as $pregunta)
                                <option value="{{ $pregunta->id }}" {{ $pregunta_similar->id_pregunta == $pregunta->id ? 'selected' : '' }}>{{ $pregunta->pregunta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
@endsection
