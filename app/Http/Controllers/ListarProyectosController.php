<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request; // captura la informacion desde la web

class ListarProyectosController extends Controller
{

    public function __invoke(Request $request)
    {



$proyectos = Proyecto::all();
return view('proyectos.index', compact('proyectos')); // Ajusta el nombre de tu vista Blade


    }






}