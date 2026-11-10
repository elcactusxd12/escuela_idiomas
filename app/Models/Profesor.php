<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    // Nombre de la tabla
    protected $table = 'profesores';

    // Clave primaria
    protected $primaryKey = 'id';

    // Cantidad de registros por página
    protected $perPage = 20;

    // Campos que se pueden registrar o modificar
    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'especialidad'
    ];

    // Relación: Un profesor puede tener varios grupos
    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class, 'profesores_id', 'id');
    }
}