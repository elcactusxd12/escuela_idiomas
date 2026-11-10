<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Idioma
 *
 * @property $id
 * @property $nombre
 * @property $codigo
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso[] $cursos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Idioma extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'codigo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos()
    {
        return $this->hasMany(\App\Models\Curso::class, 'id', 'idiomas_id');
    }
    
}
