<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateInventory extends FormRequest
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
        $rules = [
        'equipment' => ['required', 'string'],
        'brand' => ['nullable', 'string'],
        'model' => ['required', 'string'],
        'condition' => ['required', 'string'],
        'amount' => ['required', 'regex:/^\d+$/'],
        'export' => ['nullable', 'string'],
    ];

    if ($this->method() == 'PUT') {

        $rules['equipment'] = ['nullable', 'string'];
        $rules['brand'] = ['string'];
        $rules['model'] = ['string'];
        $rules['condition'] = ['string'];
        $rules['amount'] = ['nullable', 'regex:/^\d+$/'];
        $rules['export'] = ['nullable', 'string'];
    }

    return $rules;

    }
}
