<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'nivel',
        'duracion_horas',
        'precio',
        'idiomas_id'
    ];

    // Relación con Idioma
    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'idiomas_id', 'id');
    }

    // Relación con Grupos
    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'cursos_id', 'id');
    }
}