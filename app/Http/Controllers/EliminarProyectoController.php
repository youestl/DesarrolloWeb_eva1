PHP
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class EliminarProyectoController extends Controller
{
    public function show($id)
    {
        
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.borrar', compact('proyecto'));
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function eliminarPorId(Request $request)
    {
        $id = $request->input('id');
        $proyecto = Proyecto::find($id);

        if ($proyecto) {
            $proyecto->delete();
            return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
        }

        return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado.');
    }
}