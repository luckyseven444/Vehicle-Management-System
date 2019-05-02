<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'department.required' => 'Department is Required',
            'join_date.required' => 'Join date is Required',
            'address.required' => 'Address is Required',
            'manager.required' => 'Manager is Required',
            'image.required' => 'Image is Required',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'department' => 'required',
            'join_date' => 'required',
            'address' => 'required',
            'manager' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
