<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestRole extends Request
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
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'display_name.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
            'permission.required' => 'Không được để trống',
        ];
    }
}
