<?php

namespace Pictunes\Http\Requests;

use Pictunes\Http\Requests\Request;

class UpdateUserData extends FormRequest
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
            'username' => 'alpha_num|min:4|max:92|unique:users,username',
            'password' => 'min:8|max:64',
            'email_address' => 'email',
            'selfie_name' => 'image|unique:users,selfie_name'
        ];
    }
}
