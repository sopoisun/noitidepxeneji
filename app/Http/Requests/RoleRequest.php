<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
            $rules['key'] = 'required|unique:roles,key';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama role tidak boleh kosong.',
            'key.required' => 'Key tidak boleh kosong.',
            'key.unique' => 'Role sudah ada.',
        ];
    }
}
