<?php

namespace Core\Modules\Admin\Requests;

use App\Http\Requests\Request;

class RequestBook extends Request
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
            'title' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không được để trống',
            'content.required' => 'Không được để trống',
        ];
    }
}
