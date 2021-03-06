<?php

namespace Core\Modules\Auth\Models;

use App\Http\Requests\Request;

class RequestUser extends Request
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
            'email' => 'email',
            'password' => '',
            'roles' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name' => 'Không được để trống',
            'roles' => 'Không được để trống',
        ];
    }
}
