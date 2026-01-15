<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255|unique:companies,name",
            "description" => "required|string",
            "email" => "required|email|max:255|unique:companies,email",
            "city" => "required|string|max:100",
            "street" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:100",
            "country" => "nullable|string|max:100",
            "phone" => "nullable|string|max:100",
            "website" => "nullable|string|max:255",
            "employee_size" => "nullable|string",
        ];
    }
}
