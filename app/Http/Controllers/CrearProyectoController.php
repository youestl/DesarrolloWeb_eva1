<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class CrearProyectoController extends Controller
{
    public function create()
    {
        return view('proyectos.crear');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        // Guardamos en SQLite usando Eloquent y mapeando fecha_inicio -> fecha_de_inicio
        Proyecto::create([
            'nombre' => $datos['nombre'],
            'fecha_de_inicio' => $datos['fecha_inicio'],
            'estado' => $datos['estado'],
            'responsable' => $datos['responsable'],
            'monto' => $datos['monto'],
        ]);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente.');
    }
}