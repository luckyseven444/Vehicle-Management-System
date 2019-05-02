<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Vehicle_route_Request extends FormRequest
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

    public function messages()
    {
        return [
            'vehicle_id.required' => 'Name is Required',
            'route_id.required' => 'Route is Required',
        ];
    }




    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_id' => 'required',
            'route_id' => 'required',

        ];
    }
}
