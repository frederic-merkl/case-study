<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Every user is allowed to login
        // I can write rules for who is allowed to make requests. Eg "this" IP is not allowed to make one.
        // Or only people from a cetain network can login.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   // login data validation rules
        // email:rfc,dns for more strict validation
        return [ 
            'email' => 'required|string|email',
            'password' => 'required'
        ];
    }
}
