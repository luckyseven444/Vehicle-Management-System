<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'vehicle_type.required' => 'Vehicle type Name Is Required'
        ];
    }

    public function rules()
    {
        return [
            'vehicle_type' => 'required'
        ];
    }
}
