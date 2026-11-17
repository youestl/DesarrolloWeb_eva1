<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'nombre', 
        'fecha_de_inicio',
        'estado',
        'responsable',
        'monto'
    ];

    public function getFechaInicioAttribute()
    {
        return $this->fecha_de_inicio;
    }

}