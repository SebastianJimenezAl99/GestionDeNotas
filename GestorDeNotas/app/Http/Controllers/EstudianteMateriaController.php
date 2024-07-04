<?php

namespace App\Http\Controllers;

use App\Models\estudiante_materia;
use App\Models\Nota;
use Illuminate\Http\Request;

class EstudianteMateriaController extends Controller
{
    public function index()
    {
        $estudiante_materia = estudiante_materia::all();
        return response()->json($estudiante_materia, 200);
    }

    public function show($id)
    {
        $estudiante_materia = estudiante_materia::findOrFail($id);
        return response()->json($estudiante_materia, 200);
    }

    public function store(Request $request)
    {
        $estudiante_materia = new estudiante_materia;
        $estudiante_materia->materia_id = $request->materia_id;
        $estudiante_materia->estudiante_id = $request->estudiante_id;
        $estudiante_materia->save();

        return response()->json($estudiante_materia, 201);
    }

    public function update(Request $request, $id)
    { 
        $estudiante_materia = estudiante_materia::findOrFail($id);
        $estudiante_materia->materia_id = $request->materia_id;
        $estudiante_materia->estudiante_id = $request->estudiante_id;
        $estudiante_materia->save();
        
        return response()->json($estudiante_materia, 200);
    }

    public static function destroy($id)
    {
        $estudiante_materia = estudiante_materia::findOrFail($id);
        Nota::where('estudiante_materia_id', $id)->delete();
        $estudiante_materia->delete();
        return response()->json(null, 204);
    }
}
