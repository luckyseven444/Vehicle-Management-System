<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddassigndriverRequest extends FormRequest
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
            'driver_id.required' => 'Name is Required',
            'vehicle_id.required' => 'Reg. No. is Required',
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
            'driver_id' => 'required',
            'vehicle_id' => 'required',

        ];
    }
}
