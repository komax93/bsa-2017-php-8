<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            "model" => "required|max:255",
            "registration_number" => "required|alpha_num|size:6",
            "year" => "required|integer|between:1000," . date('Y'),
            "color" => "required|max:255|alpha",
            "price" => "required|numeric"
        ];
    }
}
