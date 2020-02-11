<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'email'=> 'required|email|min:3|max:100',
            'password'=> 'required|min:4|max:50',
            'first_name'=> 'required|min:3|max:50',
            'last_name'=> 'required|min:3|max:50',
            'identification_card'=> 'required|min:7',
            'phone'=> 'required|numeric|min:10',
        ];
    }
    public function messages(){
        return[
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no corresponde con una dirección de correo electrónico válida',
            'email.min' => 'El correo electrónico es muy corto',
            'email.max' => 'El correo electrónico es muy largo',
            'password.required' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña es muy larga',
            'password.min' => 'La contraseña es muy corta',
            'first_name.required' => 'El campo nombre es obligatorio',
            'first_name.max' => 'El campo nombre es muy largo',
            'first_name.min' => 'El campo nombre es muy corto',
            'last_name.required' => 'El campo apellido es obligatorio',
            'last_name.max' => 'El campo apellido es muy largo',
            'last_name.min' => 'El campo apellido es muy corto',
            'identification_card.required' => 'El campo cedúla es obligatorio',
            'identification_card.min' => 'El campo cedúla es muy corto',
            'phone.required' => 'El campo teléfono es obligatorio',
            'phone.max' => 'El campo teléfono es muy largo',
            'phone.min' => 'El campo teléfono es muy corto',
            'phone.numeric' => 'El campo teléfono tiene que ser numerico',

        ];
    }
}
