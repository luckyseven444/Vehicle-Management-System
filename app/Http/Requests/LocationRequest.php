<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
    public function messages()
    {
        return [
            'location.required' => 'Location Name Is Required',
            'location.unique:locations' => 'Location Name Is already exists'
        ];
    }

    public function rules()
    {
        return [
            'location' => 'required|unique:locations|max:255'

        ];
    }
}
