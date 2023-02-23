<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpcionesAlumno;

class OpcionesAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $opciones = OpcionesAlumno::all();
        return view('menu_alumno.index', compact('opciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('menu_alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $opcion = new OpcionesAlumno();
        $opcion->id = $request->id;
        $opcion->opcion = $request->opcion;
        $opcion->respuesta = $request->respuesta;
        $opcion->nextstep = $request->nextstep;
        $opcion->save();
        return redirect()->route('menu_alumno.index')->with('success', 'Opcion creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function menuresp($id)
    {
        $opcion = OpcionesAlumno::find($id);
        $opcionesp =$opcion->opcion;
        $respuesta = $opcion->respuesta;

        // Devolver la respuesta como una respuesta JSON
        return response()->json(['respuesta' => $respuesta,'opcion' => $opcionesp]);
    }

    public function menu(){
        $opciones = OpcionesAlumno::get();
        return response()->json($opciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $opcion = OpcionesAlumno::find($id);
        return view('menu_alumno.edit', compact('opcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Obtener la opcion a actualizar
        $opcion = OpcionesAlumno::find($id);
        
        // Validar los datos del formulario
       $request->validate([
            'opcion' => 'required|max:80',
            'respuesta' => 'required',
            'nextstep' => 'required'
            //'id_preguntas' => 'required|exists:preguntas,id',
        ]);

        // Actualizar la opcion con los datos del formulario
        $opcion->id = $id;
        $opcion->opcion = $request->opcion;
        $opcion->respuesta = $request->respuesta;
        $opcion->nextstep = $request->nextstep;
        $saveresult = $opcion->save();
     

        // Redirigir al usuario de vuelta a la lista de preguntas similares
        return redirect()->route('menu_alumno.index')
                        ->with('mensaje', 'La opcion ha sido actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $opcion = OpcionesAlumno::find($id);
        $opcion->delete();
        return redirect()->route('menu_alumno.index')->with('success', 'Opcion eliminada exitosamente');
    }
}
