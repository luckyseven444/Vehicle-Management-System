<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FitnessRequest extends FormRequest
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
            'vehicle_number.required' => 'Vehicle Number Name Is Required',
            'last_fitness_check.required' => 'fitness date Is Required',
            'next_fitness_check.required.unique:fitnesses' => 'fitness date Is Required',
            'fitness_description.required' => 'fitness  Description Is Required',
            //'fitness_certificate.required' => 'Image  Is Required',
            'status.required' => 'Vehicle Number Name Is Required',

        ];
    }

    public function rules()
    {
        return [
            'vehicle_number' => 'required',
            'last_fitness_check' => 'required',
            'next_fitness_check' =>'required|unique:fitnesses,last_fitness_check',
            //'next_fitness_check' => 'required|unique:fitnesses',
            'fitness_description' => 'required',
            //'fitness_certificate' => 'required',
            'status' => 'required',

        ];
    }
}
