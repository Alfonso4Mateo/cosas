<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    protected $table = 'trabajadores';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'puesto',
        'salario',
    ];
    public $timestamps = true;
}
