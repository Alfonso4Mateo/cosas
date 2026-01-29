<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nominas extends Model
{
    protected $table = 'nominas';

    protected $fillable = [
        'trabajador_id',
        'mes',
        'anio',
        'salario_base',
        'descuentos',
        'bonificaciones',
        'salario_neto',
    ];
    public $timestamps = true;

    public function trabajador()
    {
        return $this->belongsTo(Trabajadores::class, 'trabajador_id');
    }
}
