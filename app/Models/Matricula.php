<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Matricula
 *
 * @property $id
 * @property $fecha_matricula
 * @property $precio_total
 * @property $estado
 * @property $alumnos_id
 * @property $grupos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Alumno $alumno
 * @property Grupo $grupo
 * @property Asistencia[] $asistencias
 * @property Pago[] $pagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Matricula extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha_matricula', 'precio_total', 'estado', 'alumnos_id', 'grupos_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class, 'alumnos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupo()
    {
        return $this->belongsTo(\App\Models\Grupo::class, 'grupos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany(\App\Models\Asistencia::class, 'id', 'matriculas_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany(\App\Models\Pago::class, 'id', 'matriculas_id');
    }
    
}
