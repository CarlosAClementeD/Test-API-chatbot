<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\PreguntaSimilar;

class PreguntasSimilaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $preguntas_similares = PreguntaSimilar::all();
        return view('preguntas_similares.index', compact('preguntas_similares'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $pregunta = Pregunta::findOrFail($id);
        return view('preguntas_similares.create', compact('pregunta'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $pregunta_similar = new PreguntaSimilar();
        $pregunta_similar->pregunta = $request->pregunta;
        $pregunta_similar->id_preguntas = $request->id_preguntas;
        $pregunta_similar->save();
        return redirect()->route('preguntas_similares.show',['id' => $request->id_preguntas])->with('success', 'Pregunta similar creada exitosamente');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $pregunta = Pregunta::findOrFail($id);
        $preguntas_similares = $pregunta->preguntas_similares;
        return view('preguntas_similares.show', compact('pregunta', 'preguntas_similares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id){
        $pregunta_similar = PreguntaSimilar::find($id);
        $preguntas = Pregunta::all();
        return view('preguntas_similares.edit', compact('pregunta_similar', 'preguntas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id){
        // Obtener la pregunta similar a actualizar
        $preguntaSimilar = PreguntaSimilar::find($id);
        $id_preguntas =$preguntaSimilar->id_preguntas;
        // Validar los datos del formulario
       $request->validate([
            'pregunta' => 'required|max:150',
            //'id_preguntas' => 'required|exists:preguntas,id',
        ]);

        // Actualizar la pregunta similar con los datos del formulario
        $preguntaSimilar->pregunta = $request->pregunta;
        $preguntaSimilar->id_preguntas = $id_preguntas;
        $saveresult = $preguntaSimilar->save();
     

        // Redirigir al usuario de vuelta a la lista de preguntas similares
        return redirect()->route('preguntas_similares.show',['id' => $id_preguntas])
                        ->with('mensaje', 'La pregunta similar ha sido actualizada correctamente.');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $preguntaSimilar = PreguntaSimilar::find($id);
        $preguntaSimilar->delete();
        return redirect()->route('preguntas_similares.show',['id' => $preguntaSimilar->id_preguntas])->with('success', 'Pregunta similar eliminada exitosamente');
    }

}
