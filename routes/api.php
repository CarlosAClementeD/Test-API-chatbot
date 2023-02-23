<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\OpcionesAspiranteController;
use App\Http\Controllers\OpcionesAlumnoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('preguntas', PreguntasController::class);
Route::post('enviar-correo', [PreguntasController::class, 'enviarCorreo']);
Route::get(
    '/menu_aspirante/menu',
    [OpcionesAspiranteController::class, 'menu']
)->name('menu_aspirante.menu');

Route::get(
    '/menu_aspirante/menu/{id}',
    [OpcionesAspiranteController::class, 'menuresp']
)->name('menu_aspirante.menuresp');

Route::get(
    '/menu_alumno/menu',
    [OpcionesAlumnoController::class, 'menu']
)->name('menu_aspirante.menu');

Route::get(
    '/menu_alumno/menu/{id}',
    [OpcionesAlumnoController::class, 'menuresp']
)->name('menu_aspirante.menuresp');