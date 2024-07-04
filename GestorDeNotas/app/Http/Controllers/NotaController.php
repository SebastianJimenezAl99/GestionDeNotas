<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::all();
        return response()->json($notas, 200);
    }

    public function show($id)
    {
        $nota = Nota::findOrFail($id);
        return response()->json($nota, 200);
    }

    public function store(Request $request)
    {
        $nota = new Nota;
        $nota->estudiante_materia_id = $request->estudiante_materia_id;
        $nota->nota = $request->nota;
        $nota->observaciones = $request->observaciones; 
        $nota->save();

        return response()->json($nota, 201);
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->estudiante_materia_id = $request->estudiante_materia_id;
        $nota->nota = $request->nota;
        $nota->observaciones = $request->observaciones; 
        $nota->save();

        return response()->json($nota, 200);
    }

    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();
        return response()->json(null, 204);
    }
}
