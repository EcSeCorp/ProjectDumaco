<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class agregarUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique|max:8',
            'perfiles' => 'required',
            'empresa' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido-materno' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique|max:8',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
