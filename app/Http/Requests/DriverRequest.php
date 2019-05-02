<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'name.required' => 'Name is Required',
            'code.required' => 'Code is Required',

            'join_date.required' => 'Join date is Required',
            'address.required' => 'Address is Required',
            'manager.required' => 'Manager is Required',
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
            'name' => 'required',
            'code' => 'required',

            'join_date' => 'required',
            'address' => 'required',
            'manager' => 'required',

        ];
    }
}
