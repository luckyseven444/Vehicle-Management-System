<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'department_name.required' => 'Department Name Is Required'
        ];
    }

    public function rules()
    {
        return [
            'department_name' => 'required'
        ];
    }
}
