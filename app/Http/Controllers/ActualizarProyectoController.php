<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ActualizarProyectoController extends Controller
{
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.edicion', compact('proyecto'));
    }

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        
$proyecto = Proyecto::findOrFail($id);
$proyecto->update([
    'nombre' => $request->input('nombre'),
    'fecha_de_inicio' => $request->input('fecha_de_inicio') ?? $request->input('fecha_inicio'),
    'estado' => $request->input('estado'),
    'responsable' => $request->input('responsable'),
    'monto' => $request->input('monto'),
]);


return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente.');

    }
}