<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypesRequest extends FormRequest
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
            'name' => [
                'max:191',
                'min:1',
                'unique:types',
                'regex:/^[A-Z][a-z0-9_-]+/',
                'required'
            ]
        ];
    }
}
