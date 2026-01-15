<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
    {   // get model through route model bindung
        $company = $this->route('company');
        return [
            "name" => "required|string|max:255|unique:companies,name,{$company->id}",
            "description" => "required|string",
            "email" => "required|email|max:255|unique:companies,email,{$company->id}",
            "city" => "required|string|max:100",
            "street" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:100",
            "country" => "nullable|string|max:100",
            "phone" => "nullable|string|max:100",
            "website" => "nullable|url|max:255",
            "employee_size" => "nullable|string",
        ];
    }
}
