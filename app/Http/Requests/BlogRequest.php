<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
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
            'password' => 'required|min:6',
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'country_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password should be at least 6 characters long.',
            'name.required' => 'Name is required.',
            'name.regex' => 'Name should only contain letters.',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'country_id.required' => 'Country is required',
        ];
    }
}
