<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Seat_assignRequest extends FormRequest
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
            'route' => 'required',
            'vehicle' => 'required',
            'employee' => 'required',
//            'seat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'route.required' => 'Route is Required',
            'vehicle.required' => 'Vehicle is Required',
            'employee.required' => 'Employee is Required',
//            'seat.required' => 'Seat is Required',
        ];
    }
}
