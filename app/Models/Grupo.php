<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'horario',
        'cupo_maximo',
        'cursos_id',
        'profesores_id'
    ];

    // Relación con Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cursos_id', 'id');
    }

    // Relación con Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesores_id', 'id');
    }

    // Relación con Matrículas
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'grupos_id', 'id');
    }
}