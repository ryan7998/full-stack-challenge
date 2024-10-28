<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only admins can update companies.
     */
    public function authorize()
    {
        return $this->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'name'        => [
                'required',
                'string',
                'max:255',
                Rule::unique('companies', 'name')->ignore($this->company->id),
            ],
            'description' => 'required|string',
            'website'     => 'nullable|url|max:255',
            // Add more fields if necessary
        ];
    }
}
