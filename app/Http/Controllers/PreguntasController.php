<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\PreguntaSimilar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  string  $texto
     * @return \Illuminate\Http\Response
     */
    public function LimpiarTexto($texto) {
        // Eliminar caracteres especiales
        $texto = preg_replace('/[^a-zA-Z0-9 ]/', '', $texto);
      
        // Reemplazar vocales con acento
        $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú');
        $reemplazar = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');
        $texto = str_replace($buscar, $reemplazar, $texto);
      
        return strtolower($texto);
    }

    public function LimpiarArreglo($arreglo) {
        $arregloProcesado = array();
        foreach ($arreglo as $texto) {
          $textoProcesado = $this->LimpiarTexto($texto);
          array_push($arregloProcesado, $textoProcesado);
        }
        return $arregloProcesado;
    }

    public function jaccardSimilarity($arr1, $str2) {
        $arr2 = explode(' ', $str2);
        $jaccardArray = array();
        foreach ($arr1 as $string1) {
            $set1 = array_flip(explode(" ", $string1));
            $set2 = array_flip($arr2);
            $intersection = array_intersect_key($set1, $set2);
            $union = array_merge($set1, $set2);
            $jaccardArray[] = (count($intersection) / count($union)) * 100;
        }
        return $jaccardArray;
    }
    
     public function show($texto){
         $preguntas = Pregunta::pluck('pregunta')->toArray();
         $jaccardArray = $this->jaccardSimilarity($this->LimpiarArreglo($preguntas),$texto);
         $coincidencia = max($jaccardArray);
         $maxIndex = array_search($coincidencia, $jaccardArray);
        if($coincidencia < 40){
            $preguntasSimilares = PreguntaSimilar::pluck('pregunta')->toArray();
            $jaccardArraySim = $this->jaccardSimilarity($this->LimpiarArreglo($preguntasSimilares),$texto);
            $coincidenciaSim = max($jaccardArraySim);
            $maxIndexSim = array_search($coincidenciaSim, $jaccardArraySim);
            $respuestaSim = DB::table('preguntas')
                ->join('preguntas_similares','preguntas.id', '=', 'preguntas_similares.id_preguntas')
                ->select('respuesta')
                ->where('preguntas_similares.pregunta', '=', $preguntasSimilares[$maxIndexSim])
                ->get();
                if($coincidenciaSim >40){
                    return response()->json([
                        'respuesta' => $respuestaSim[0]->respuesta,
                        'coincidencia' => $coincidenciaSim
                    ]);
                }else{
                    return response()->json([
                        'respuesta' => 'No encontré información acerca de tu pregunta, intenta hacer otra pregunta o cambia la redacción de tu pregunta anterior.',
                        'coincidencia' => $coincidenciaSim
                    ]);
                }
           
        }else{
            $respuesta = Pregunta::where('pregunta', $preguntas[$maxIndex])->value('respuesta');
            return response()->json([
                'respuesta' => $respuesta,
                'coincidencia' => $coincidencia
            ]);
        }

     }

    
     
     
     public function enviarCorreo(Request $request){
         $nombre = $request->input('nombre');
         $correo = $request->input('correo');
         $mensaje = $request->input('mensaje');
     
         $datos = array(
             'nombre' => $nombre,
             'correo' => $correo,
             'mensaje' => $mensaje
         );
     
         Mail::to('web@uaem.mx')->send(new EnviarCorreo($datos));
     
         return response()->json(['message' => '¡Correo enviado exitosamente!'], 200);
     }
     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
