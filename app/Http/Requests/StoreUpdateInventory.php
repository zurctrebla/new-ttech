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
        // $uuid = $this->inventory ?? '';

        $rules = [
        // 'partner' => ['required', 'string'/* , 'min:3', 'max:255', "unique:readings,name,{$uuid},uuid" */],
        'product' => ['required', 'string'],
        'description' => ['required', 'string'],
        'brand' => ['required', 'string'],
        'model' => ['required', 'string'],
        'tag' => ['required', 'string'],
        'amount' => ['required', 'regex:/^\d+$/'],
    ];

    if ($this->method() == 'PUT') {

        $rules['product'] = ['nullable', 'string'];
        $rules['description'] = ['string'];
        $rules['brand'] = ['string'];
        $rules['model'] = ['string'];
        $rules['tag'] = ['string'];
        $rules['amount'] = ['nullable', 'regex:/^\d+$/'];
    }

    return $rules;
    }
}
