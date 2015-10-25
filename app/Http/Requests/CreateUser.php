<?php

namespace Pictunes\Http\Requests;

use Pictunes\Http\Requests\UpdateUserData;

class CreateUser extends UpdateUserData
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
          'username' => 'required',
          'password' => 'required',
          'email_address' => 'required'
        ];
    }
}
