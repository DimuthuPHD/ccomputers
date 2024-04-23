<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

        $data = [];


        $data["first_name"] = 'required';
        $data["last_name"] = 'required';
        $data["email"] = 'required|email';
        $data["phone"] = 'required';
        $data["address"] = 'required';
        $data["city"] = 'required';
        $data["postal_code"] = 'required';

        if($this->ship_to_different_address){
            $data["different.first_name"] = 'required';
            $data["different.last_name"] = 'required';
            $data["different.email"] = 'required|email';
            $data["different.phone"] = 'required';
            $data["different.address"] = 'required';
            $data["different.city"] = 'required';
            $data["different.postal_code"] = 'required';
        }
        return $data;
    }
}
