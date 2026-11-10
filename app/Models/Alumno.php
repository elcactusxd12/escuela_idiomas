<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
 * @property $dni
 * @property $nombres
 * @property $apellidos
 * @property $email
 * @property $telefono
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['dni', 'nombres', 'apellidos', 'email', 'telefono', 'direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'id', 'alumnos_id');
    }
    
}
