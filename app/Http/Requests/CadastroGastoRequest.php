<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CadastroGastoRequest extends FormRequest
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
            'nome' => 'required',
            'descricao' => 'required',
            'valor' => 'required|gt:0',
            'tag' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'tag' => 'Tag'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $erros = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json(['errors' => $erros], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
