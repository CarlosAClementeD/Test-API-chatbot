<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntasSimilaresController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\OpcionesAspiranteController;
use App\Http\Controllers\OpcionesAlumnoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('preguntas_similares', PreguntasSimilaresController::class);
Route::resource('preguntas', PreguntasController::class);
Route::resource('menu_aspirante', OpcionesAspiranteController::class);
Route::resource('menu_alumno', OpcionesAlumnoController::class);
/*
//Route::get('/preguntas_similares', 'PreguntasSimilaresController@index')->name('preguntas_similares.index');

//Route::get('/preguntas_similares/{id}/edit', 'PreguntasSimilaresController@edit')->name('preguntas_similares.edit');

//Route::delete('/preguntas_similares/{id}', 'PreguntasSimilaresController@destroy')->name('preguntas_similares.destroy');

//Route::put('/preguntas_similares/{id}', 'PreguntasSimilaresController@update')->name('preguntas_similares.update');

//Route::post('/preguntas_similares', 'PreguntasSimilaresController@store')->name('preguntas_similares.store');

//Route::get('/preguntas/{id}/preguntas_similares/create', 'PreguntasSimilaresController@create')->name('preguntas_similares.create');

//Route::get('/preguntas/{id}/preguntas_similares', 'PreguntasSimilaresController@show')->name('preguntas_similares.show');
*/
Route::get(
    '/preguntas/{id}/preguntas_similares/create',
    [PreguntasSimilaresController::class, 'create']
)->name('preguntas_similares.create');

Route::get(
    '/preguntas/{id}/preguntas_similares',
    [PreguntasSimilaresController::class, 'show']
)->name('preguntas_similares.show');