<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $fecha
 * @property $estado
 * @property $observacion
 * @property $matriculas_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Matricula $matricula
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha', 'estado', 'observacion', 'matriculas_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matricula()
    {
        return $this->belongsTo(\App\Models\Matricula::class, 'matriculas_id', 'id');
    }
    
}
