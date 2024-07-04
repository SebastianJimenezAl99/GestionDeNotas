<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\estudiante_materia;
use Illuminate\Http\Request;
use LengthException;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiante = Estudiante::all();
        return response()->json($estudiante, 200);
    }


    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        return response()->json($estudiante, 200);
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->curso_id = $request->curso_id;
        $estudiante->save();
        return response()->json($estudiante, 200);
    }

    public function store(Request $request)
    {
        $estudiante = new Estudiante;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->curso_id = $request->curso_id;
        $estudiante->save();

        return response()->json($estudiante, 200);
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $ids_e_m = estudiante_materia::where('estudiante_id', $estudiante->id)->pluck('id');
        if ($ids_e_m->count() > 0) {
            for ($i=0; $i < $ids_e_m->count() ; $i++) { 
                EstudianteMateriaController::destroy($ids_e_m[$i]);
            }
        }
        $estudiante->delete();
        return response()->json(null, 204);
    }

}
