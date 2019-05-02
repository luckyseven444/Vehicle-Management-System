<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrivateVehicleRequest extends FormRequest
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
            'employee_id' => 'required',
            'vehicle_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Please select an employee',
            'vehicle_id.required' => 'Please select a vehicle',
        ];
    }
}
