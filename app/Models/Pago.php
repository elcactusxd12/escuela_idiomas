<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matricula;

class Pago extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'monto',
        'fecha_pago',
        'metodo_pago',
        'concepto',
        'matriculas_id'
    ];

    /**
     * Relación con Matrícula
     */
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'matriculas_id', 'id');
    }
}