<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRole extends FormRequest
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
        $uuid = $this->role ?? '';

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255', "unique:roles,name,{$uuid},uuid"],
            'description' => ['nullable', 'string', 'min:3', 'max:255'],
        ];

        if ($this->method() == 'PUT') {
            $rules['name'] = ['nullable', 'min:3', 'max:255'];
            $rules['description'] = ['nullable', 'min:3', 'max:255'];
        }

        return $rules;
    }
}
