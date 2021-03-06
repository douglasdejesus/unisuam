<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name' => 'required',
            'cpf' => 'required|cpf',
            'phone' => 'required',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'cpf.required' => 'O campo CPF é obrigatório',
            'phone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório'
        ];
    }
    
}
