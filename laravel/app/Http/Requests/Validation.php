<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validation extends FormRequest
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
        'fullName' => "required",
        'dateOfBirth' => "required",
        'gender' => "required",
        'nation' => "required",
        'phone' => "required|regex:/(0)[0-9]{8}/",
        'email' => "required|email|unique:users",
        'address' => "required",
        'pecialize' => "required",
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => "Bạn chưa nhập thông tin",
            'dateOfBirth.required' => "Bạn chưa nhập thông tin",
            'gender.required' => "Bạn chưa nhập thông tin",
            'nation.required' => "Bạn chưa nhập thông tin",
            'phone.required' => "Bạn chưa nhập thông tin",
            'phone.regex' => "Thông tin chưa đúng",
            'email.required' => "Bạn chưa nhập thông tin",
            'email.email' => "Thông tin chưa đúng",
            'address' => "required",
            'pecialize' => "required",
        ];
    }
}
