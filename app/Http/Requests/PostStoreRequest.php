<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only admins can store posts.
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
            'title'          => 'required|string|max:255',
            'company_id'     => 'required|exists:companies,id',
            'description'    => 'required|string',
            'position_type'  => 'required|in:remote,in-person',
            'salary'         => 'required|numeric|min:0',
            'location'       => 'required|string|max:255',
            // Add more fields if necessary
        ];
    }
}
