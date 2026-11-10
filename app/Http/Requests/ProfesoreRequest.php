<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesoreRequest extends FormRequest
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
			'dni' => 'required|string',
			'nombres' => 'required|string',
			'apellidos' => 'required|string',
			'email' => 'required|string',
			'telefono' => 'string',
			'especialidad' => 'required|string',
        ];
    }
}
