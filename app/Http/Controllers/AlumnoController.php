<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Validation\Rule;

class AlumnoController extends Controller
{
    // GET /api/alumnos
    public function index()
    {
        return response()->json(Alumno::all());
    }

    // GET /api/alumnos/{id}
    public function show($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json([
                'message' => 'Alumno no encontrado.'
            ], 404);
        }

        return response()->json($alumno, 200);
    }

    // POST /api/alumnos
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:32'],
            'telefono' => ['nullable', 'string', 'max:16'],
            'edad' => ['nullable', 'integer'],
            'password' => ['required', 'string', 'max:64'],
            'email' => ['required', 'email', 'unique:alumnos,email'],
            'sexo' => ['required', 'string'],
        ]);

        $alumno = Alumno::create($data);

        return response()->json($alumno, 201);
    }

    // PUT/PATCH /api/alumnos/{id}
    public function update(Request $request, $id) 
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json([
                'message' => 'Alumno no encontrado.',
            ], 404);
        }

        $data = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:32'],
            'telefono' => ['sometimes', 'nullable', 'string', 'max:16'],
            'edad' => ['sometimes', 'nullable', 'integer'],
            'password' => ['sometimes', 'required', 'string', 'max:64'],
            'email' => [
                'sometimes', 'required', 'string', 'email', 'max:64',
                Rule::unique('alumnos', 'email')->ignore($alumno->id),
            ],
            'sexo' => ['sometimes', 'required', 'string'],
        ]);
        
        $alumno->update($data);

        return response()->json($alumno, 200);
    }

    // DELETE /api/alumnos/{id}
    public function destroy($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json([
                'message' => 'Alumno no encontrado.',
            ], 404);
        }

        $alumno->delete();

        return response()->json([
            'message' => 'Alumno eliminado correctamente.',
        ], 204);
    }
}
