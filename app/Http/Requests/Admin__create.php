<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin__create extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //validacion
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:30',
            'apellido' => 'required|regex:/^[\pL\s\-]+$/u|max:30',
            'email'=>'required|unique:users',
            'Celular'=>'required|min:8|max:15',
            'password' => 'required|min:6|max:10',
        ];
    }

    public function messages(){
        return [

            'email.unique'=>'El correo ya existe por favor introduzca otro',
            'name.regex'=>'Nombres invalido',
            'apellido.regex'=>'Apellido invalido',
            'Celular.min'=>'El numero celular debe tener minimo 7 caracteres',
            'Celular.max'=>'El numero celular no debe tener mas de  15 caracteres',
            'name.max'=>'Demaciados caracteres en el nombre',
            'name.min'=>'El numero debe tener 7 caracteres',
            'password.max'=>'La contraseña debe tener minimo de 6 caracteres',
            'password.min'=>'La contraseña no debe tener mas de 10 caracteres',
        ];

    }



}
