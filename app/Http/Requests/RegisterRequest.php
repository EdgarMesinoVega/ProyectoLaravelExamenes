<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'usuario' => 'required|unique:users,usuario',
            'tipoUsuario' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Debes ingresar un nombre',
            'usuario.required'=>'Debes ingresar un usuario',
            'usuario.unique'=>'Este usuario ya existe!',
            'password.required'=>'Debes ingresar una contraseña',
        ];
    }
}
