<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $roles = [
            'name'      => 'required',
            'roles'     => 'required',
        ];

        if( $this->get('state') == 'create' ){
            $roles += [
                'email'     => 'required|unique:users,email',
                'password'  => 'required|confirmed',
            ];
        }

        return $roles;
    }

    public function messages()
    {
        return [
            'email.required'        => "email tidak boleh kosong.",
            'email.unique'          => "email sudah dipakai.",
            'password.required'     => "Password tidak boleh kosong.",
            'password.confirmed'    => "Password konfirmasi tidak sama.",
            'name.required'         => "Username tidak boleh kosong.",
            'roles.required'        => "Role tidak boleh kosong.",
        ];
    }
}
