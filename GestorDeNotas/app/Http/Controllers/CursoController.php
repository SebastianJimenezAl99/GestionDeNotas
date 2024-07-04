<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $curso = Curso::all();
        return response()->json($curso, 200);
    }

    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso, 200);
    }

    public function store(Request $request)
    {
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->save();

        return response()->json($curso, 201);
    }

    public function update(Request $request, $id)
    { 
        $curso = Curso::findOrFail($id);
        $curso->nombre = $request->nombre;
        $curso->save();
        
        return response()->json($curso, 200);
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        Estudiante::where('curso_id', $id)->update(['curso_id' => 0]);
        $curso->delete();
        return response()->json(null, 204);
    }
}
