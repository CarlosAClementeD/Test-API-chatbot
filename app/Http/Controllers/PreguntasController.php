<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Preguntas::all();

        return response()->json([
            'preguntas' => $preguntas,
        ]);
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
         $preguntas = Preguntas::pluck('pregunta')->toArray();
         $jaccardArray = $this->jaccardSimilarity($preguntas, $texto);
         $coincidencia = max($jaccardArray);
         $maxIndex = array_search($coincidencia, $jaccardArray);
        if($coincidencia < 40){
            return response()->json([
                'respuesta' => 'No encontre respuesta a tu pregunta , intenta reformulando tu pregunta',
                'coincidencia' => $coincidencia
            ]);
        }else{
            $respuesta = Preguntas::where('pregunta', $preguntas[$maxIndex])->value('respuesta');
            return response()->json([
                'respuesta' => $respuesta,
                'coincidencia' => $coincidencia
        ]);
        }

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
