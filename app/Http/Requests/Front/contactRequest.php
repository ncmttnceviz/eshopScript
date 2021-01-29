<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "subject" => "required",
            "email" => "required | email",
            "phonenumber" => "required | numeric",
            "message" => "required"
        ];
    }
}
