<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'nombre' => 'required|string',
			'fecha_inicio' => 'required',
			'fecha_fin' => 'required',
			'horario' => 'required|string',
			'cupo_maximo' => 'required',
			'cursos_id' => 'required',
			'profesores_id' => 'required',
        ];
    }
}
