<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistration extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:user_details',
            'mobile' => 'required|digits:10|unique:user_details',
            'email' => 'email|unique:user_details',
            'password' => 'required',
            'confirm_password' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
//            'email.required' => 'Email is required!',
//            'name.required' => 'Name is required!',
//            'password.required' => 'Password is required!'
        ];
    }
}
