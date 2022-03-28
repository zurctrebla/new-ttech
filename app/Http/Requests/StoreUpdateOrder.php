<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOrder extends FormRequest
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
        // $uuid = $this->order ?? '';

        // protected $fillable = ['user_id', 'type', 'number', 'amount', 'description', 'delivery', 'status'];

        $rules = [
            // 'name' => ['required', 'string', 'min:3', 'max:255', "unique:orders,name,{$uuid},uuid"],
            'type' => ['required', 'string', 'min:3', 'max:255'],
            'number' => ['required', 'string', 'min:3', 'max:255'],
            'amount' => ['required', 'regex:/^\d+$/'],
            'description' => ['nullable', 'string', 'min:3', 'max:255'],
            'delivery' => ['nullable', 'date'],
        ];

        if ($this->method() == 'PUT') {

            $rules['name'] = ['nullable', 'min:3', 'max:255'];
            $rules['description'] = ['nullable', 'min:3', 'max:255'];
        }

        return $rules;
    }
}
