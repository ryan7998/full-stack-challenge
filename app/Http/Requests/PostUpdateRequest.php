<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'company_id'     => 'required|exists:companies,id',
            'position_type'  => 'required|in:remote,in-person',
            'salary'         => 'required|integer|min:0',
            'location'       => 'required|string|max:255',
        ];
    }
}
