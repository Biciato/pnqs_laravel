<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'email' => 'required|email',
            'cnpj' => 'required',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Insira um e-mail',
            'cnpj.required'  => 'Insira um CNPJ',
            'password.required' => 'Insira um e-mail',
            'password.min' => 'A senha precisa ter no mínimo 8 caracteres',
            'email.email' => 'formato inváido de e-mail',
        ];
    }
}
