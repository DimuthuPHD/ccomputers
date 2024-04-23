<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email',
            'review_text' => 'required|max:1500|min:100'
        ];
    }
}
