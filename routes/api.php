<?php

use App\Http\Controllers\Estudiantes\ConsultaEstudianteController;
use App\Http\Controllers\Estudiantes\ConsultaListadoEstudiantesController;
use App\Http\Controllers\Estudiantes\CreateEstudianteController;
use App\Http\Controllers\Estudiantes\DeletedEstudianteController;
use App\Http\Controllers\Estudiantes\UpdatedEstudianteController;

use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('estudiantes/search', [ConsultaListadoEstudiantesController::class, 'index']);
Route::get('estudiantes/search/{search}', [ConsultaListadoEstudiantesController::class, 'index']);
Route::get('estudiantes/{id}', [ConsultaEstudianteController::class, 'show']);
Route::post('estudiantes', [CreateEstudianteController::class, 'store']);
Route::put('estudiantes/{id}', [UpdatedEstudianteController::class, 'update']);
Route::delete('estudiantes/{id}', [DeletedEstudianteController::class, 'destroy']);

Route::post('register', [RegisterController::class, 'register']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
