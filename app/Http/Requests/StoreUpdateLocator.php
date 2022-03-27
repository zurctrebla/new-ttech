<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLocator extends FormRequest
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
        $uuid = $this->locator ?? '';

        $rules = [
            'locator' => ['required', 'string', 'min:3', 'max:255', "unique:locators,locator,{$uuid},uuid"],
            'serial' => ['nullable', 'string', 'min:3', 'max:255'],
            'status' => ['nullable', 'string', 'min:3', 'max:255'],
        ];

        if ($this->method() == 'PUT') {
            $rules['locator'] = ['nullable', 'min:3', 'max:255'];
            $rules['serial'] = ['nullable', 'min:3', 'max:255'];
            $rules['status'] = ['nullable', 'min:3', 'max:255'];
        }

        return $rules;
    }
}
