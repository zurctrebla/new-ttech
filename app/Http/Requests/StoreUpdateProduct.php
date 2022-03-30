<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
        $uuid = $this->product ?? '';

        $rules = [
            'inventory' => ['required', 'string', 'min:3', 'max:255'],
            'serial' => ['nullable', 'string', 'min:3', 'max:255'],
            // 'tag' => ['unique', 'string', 'min:3', 'max:255'],
            'inicial' => ['required', 'regex:/^\d+$/', "unique:products,tag,{$uuid},uuid"],
            'final' => ['required', 'regex:/^\d+$/', "unique:products,tag,{$uuid},uuid"],
            'model' => ['nullable', 'string', 'min:3', 'max:255'],
            'destiny' => ['nullable', 'string', 'min:3', 'max:255'],
            // 'inicial' => ['nullable', 'regex:/^\d+$/'],
            // 'final' => ['nullable', 'regex:/^\d+$/'],
        ];

        if ($this->method() == 'PUT') {

            $rules['equipment'] = ['nullable', 'min:3', 'max:255'];
            $rules['serial'] = ['nullable', 'min:3', 'max:255'];
            $rules['tag'] = ['nullable', 'min:3', 'max:255'];
            $rules['model'] = ['nullable', 'min:3', 'max:255'];
            $rules['destiny'] = ['nullable', 'min:3', 'max:255'];
            $rules['inicial'] = ['nullable', 'regex:/^\d+$/'];
            $rules['final'] = ['nullable', 'regex:/^\d+$/'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'min' => 'Campo deve ter no mínimo 3 caracteres',
            'max' => 'Campo deve ter no máximo 255 caracteres',
            'unique' => 'O número da etiqueta já está cadastrado',
            'required' => 'O campo etiqueta é obrigatório',
        ];
    }

}
