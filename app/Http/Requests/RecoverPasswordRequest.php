<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoverPasswordRequest extends FormRequest
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
            'email'=>'required|email',
        ];
    }
    public function messages(){
        return[
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no corresponde con una dirección de correo electrónico válida',
        ];
    }
}
