<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email'    => 'required|email',
            'name' => 'required|regex:/^[A-Za-z]+$/u',
            'phone' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'    => 'email is required',
            'email.email'    => 'email is invalid',
            'password.required'    => 'passwort is required',
        ];
        
    }
}
