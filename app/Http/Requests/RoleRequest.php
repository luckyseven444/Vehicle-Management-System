<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'role_name.required' => 'Role Name Is Required'
        ];
    }

    public function rules()
    {
        return [
            'role_name' => 'required'
        ];
    }
}
