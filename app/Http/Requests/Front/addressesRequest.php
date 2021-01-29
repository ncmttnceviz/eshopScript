<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class addressesRequest extends FormRequest
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
            "addressTitle" => "required",
            "addressDescription" => "required",
            "province" => "required",
            "district" => "required",
            "zipCode" => "required",
            "country" => "required"
        ];
    }
}
