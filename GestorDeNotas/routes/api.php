<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudianteMateriaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NotaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/estudiantes',[EstudianteController::class, 'index']);
Route::post('/estudiantes',[EstudianteController::class, 'store']);
Route::put('/estudiantes/{id}',[EstudianteController::class, 'update']);
Route::get('/estudiantes/{id}',[EstudianteController::class, 'show']);
Route::delete('/estudiantes/{id}',[EstudianteController::class, 'destroy']);

Route::get('/materias', [MateriaController::class, 'index']);
Route::get('/materias/{id}', [MateriaController::class, 'show']);
Route::post('/materias', [MateriaController::class, 'store']);
Route::put('/materias/{id}', [MateriaController::class, 'update']);
Route::delete('/materias/{id}', [MateriaController::class, 'destroy']);


Route::get('/cursos',[CursoController::class,'index']);
Route::get('/cursos/{id}',[CursoController::class,'show']);
Route::post('/cursos',[CursoController::class,'store']);
Route::put('/cursos/{id}',[CursoController::class,'update']);
Route::delete('/cursos/{id}',[CursoController::class,'destroy']);

Route::get('/estudiantes_materias', [EstudianteMateriaController::class, 'index']);
Route::get('/estudiantes_materias/{id}', [EstudianteMateriaController::class, 'show']);
Route::post('/estudiantes_materias', [EstudianteMateriaController::class, 'store']);
Route::put('/estudiantes_materias/{id}', [EstudianteMateriaController::class, 'update']);
Route::delete('/estudiantes_materias/{id}', [EstudianteMateriaController::class, 'destroy']);

Route::get('/notas', [NotaController::class, 'index']);
Route::get('/notas/{id}', [NotaController::class, 'show']);
Route::post('/notas', [NotaController::class, 'store']);
Route::put('/notas/{id}', [NotaController::class, 'update']);
Route::delete('/notas/{id}', [NotaController::class, 'destroy']);