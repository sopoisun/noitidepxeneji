<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
        $rules = [
            'name' => 'required',
        ];

        if( $this->get('state') == 'create' ){
            $rules['key'] = 'required|unique:permissions,key';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama permission tidak boleh kosong.',
            'key.required' => 'Key tidak boleh kosong.',
            'key.unique' => 'Permission sudah ada.',
        ];
    }
}
