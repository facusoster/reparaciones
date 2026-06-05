<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    protected $table = 'reparaciones';

    protected $fillable = [
        'cliente',
        'marca',
        'modelo',
        'descripcion_falla',
        'fecha_ingreso',
        'estado',
    ];
}
