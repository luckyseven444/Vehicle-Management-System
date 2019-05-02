<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
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
            'route_name.required' => 'Role Name Is Required',
            'start_location.required' => 'Role Name Is Required',
            'start_location.required' => 'Role Name Is Required'


        ];
    }

    public function rules()
    {
        return [
            'route_name' => 'required',
            'start_location' => 'required',
            'start_location' => 'required'
        ];
    }
}
