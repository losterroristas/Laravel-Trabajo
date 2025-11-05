<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255|regex:/^[^\d]+$/',
            'descripcion' => 'required|string|max:500|regex:/^[^\d]+$/',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'laboratorio' => 'required|string|max:255|regex:/^[^\d]+$/',
            'fecha_caducidad' => 'required|date|after:today',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.regex' => 'El nombre no puede contener solo números.',
            'descripcion.regex' => 'La descripción no puede contener solo números.',
            'laboratorio.regex' => 'El laboratorio no puede contener solo números.',
            'fecha_caducidad.after' => 'La fecha de caducidad debe ser posterior a hoy.',
        ];
    }
}
