<?php

namespace App\Http\Controllers;

use App\Models\estudiante_materia;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return response()->json($materias, 200);
    }

    public function show($id)
    {
        $materia = Materia::findOrFail($id);
        return response()->json($materia, 200);
    }

    public function store(Request $request)
    {
        $materia = new Materia;
        $materia->nombre = $request->nombre;
        $materia->save();

        return response()->json($materia, 201);
    }

    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->nombre = $request->nombre;
        $materia->save();

        return response()->json($materia, 200);
    }

    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $ids_e_m = estudiante_materia::where('materia_id', $materia->id)->pluck('id');
        if ($ids_e_m->count() > 0) {
            for ($i=0; $i < $ids_e_m->count() ; $i++) { 
                EstudianteMateriaController::destroy($ids_e_m[$i]);
            }
        }
        $materia->delete();
        return response()->json(null, 204);
    }
   
    
}
