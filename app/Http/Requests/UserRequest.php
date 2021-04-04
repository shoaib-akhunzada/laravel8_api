<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post') || $this->isMethod('put')) {
            return [
                'name' => 'required|string|min:3|max:100',
                'email' => 'required|string|email|unique:users,email,' . $this->user,
                'password' => 'required|min:8|max:64',
                'password_confirmation' => 'required|same:password'
            ];
        }

        return [];
    }


    public function messages()
    {
        return [
            'name.required' => 'Please provide your Name!',
        ];
    }
}
