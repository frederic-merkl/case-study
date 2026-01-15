<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            "title" => "required|string|max:255",
            "company_id" => "required|exists:companies,id",
            "description" => "nullable|string", // text DB type - string without max for validation
            "contact_email" => "required|email|max:255",
            "min_salary" => "nullable|string|max:20",
            "max_salary" => "nullable|string|max:20",
            "location" => "nullable|string|max:100",
            "contact_name" => "nullable|string|max:100",
            "contact_phone" => "nullable|string|max:100",
            "website" => "nullable|string|max:255",
            "tags" => "nullable|string|max:255",
            "category_ids" => "required|array|min:1",
            ƒ
        ];
    }
}
