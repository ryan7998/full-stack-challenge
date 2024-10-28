<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only admins can store companies.
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
            'name'        => 'required|string|max:255|unique:companies,name',
            'email'       => 'required|email|unique:companies,email',
            'description' => 'required|string',
            'website'     => 'nullable|url|max:255',
        ];
    }
}
