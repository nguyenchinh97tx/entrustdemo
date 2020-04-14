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
            'name' => 'Không được để trống',
            'display_name' => 'Không được để trống',
            'description' => 'Không được để trống',
            'permission' => 'Không được để trống',
        ];
    }
}
