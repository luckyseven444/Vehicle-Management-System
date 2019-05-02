<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVehicleRequest extends FormRequest
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
            'model_no.required'         => 'Model Name Is Required',
            'registration_no.required.unique:add_vehicles'  => 'Register Name Is Required',
            'chassis_no.required'       => 'Chassis Name Is Required',
            'engine_no.required'        => 'Engine Name Is Required',
            'vehicle_type.required'     => 'Vehicle Name Is Required',
            'owner.required'            => 'Owner Name Is Required',

        ];
    }

    public function rules()
    {
        return [
            'model_no' => 'required',
            'registration_no' => 'required|unique:add_vehicles',
            'chassis_no' => 'required',
            'engine_no' => 'required',
            'vehicle_type' => 'required',
            'owner' => 'required',

        ];
    }
}
