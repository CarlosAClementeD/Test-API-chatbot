
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                Crear opcion del Menu de Alumno
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('menu_alumno.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="pregunta">Opcion</label>
                        <input type="text" class="form-control" name="opcion" id="opcion" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pregunta">Respuesta</label>
                        <textarea class="ckeditor form-control" aria-label="With textarea" name="respuesta" id="respuesta" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pregunta">NextStep</label>
                        <input type="text" class="form-control" name="nextstep" id="nextstep" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear opcion</button>
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
