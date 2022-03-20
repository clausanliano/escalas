<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|min:6',
            'sigla' => 'required|min:2',
       ];
    }

    public function messages()
    {
        return [
            'nome.required' => "O campo 'Nome' é obrigatório",
            'nome.min' => "O campo 'Nome' deve possuir no mínimo 6 carecteres",
            'sigla.required' => "O campo 'Sigla' é obrigatório",
            'sigla.min' => "O campo 'Sigla' deve possuir no mínimo 2 carecteres",
        ];
    }
}
