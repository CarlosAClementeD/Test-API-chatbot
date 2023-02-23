@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-light">
                <h2 class="text-light">Editar Opcion</h2>
                <form action="{{ route('menu_alumno.update', $opcion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="pregunta">Opcion</label>
                        <input type="text" name="opcion" class="form-control" id="opcion" value="{{ $opcion->opcion }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pregunta">Respuesta</label>
                        <textarea class="ckeditor form-control" aria-label="With textarea" name="respuesta" id="respuesta">
                            {{ $opcion->respuesta }}
                        </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pregunta">NextStep</label>
                        <input type="text" class="form-control" name="nextstep" id="nextstep"  value="{{ $opcion->nextstep }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
            CKEDITOR.replace( 'respuesta' );
        });
    </script>
@endsection
