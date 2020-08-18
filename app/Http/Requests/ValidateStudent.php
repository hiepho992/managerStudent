<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateStudent extends FormRequest
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
            'dateOfBirth' => "required|before:tomorrow",
            'gender' => "required",
            'nation' => "required",
            'phone' => "required|regex:/^(0)[0-9]{9}/|size:10",
            'email' => "email",
            'address' => "required",
            'date_start' => "required|before:tomorrow",
            'date_end' => "after_or_equal:date_start",
            'classe' => "required"
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => "Bạn chưa nhập thông tin",
            'dateOfBirth.required' => "Bạn chưa nhập thông tin",
            'dateOfBirth.before' => "Kiểm tra lại ngày đã chọn",
            'gender.required' => "Bạn chưa nhập thông tin",
            'nation.required' => "Bạn chưa nhập thông tin",
            'phone.required' => "Bạn chưa nhập thông tin",
            'phone.regex' => "Thông tin chưa đúng",
            'phone.size' => "Thông tin chưa đúng",
            'email.email' => "Thông tin chưa đúng",
            'address.required' => "Bạn chưa nhập thông tin",
            'date_start.required' => "Bạn chưa nhập thông tin",
            'date_start.before' => "Kiểm tra lại ngày đã chọn",
            'date_end.after_or_equal' => "Kiểm tra lại ngày đã chọn",
            'classe.required' => "Bạn chưa nhập thông tin",
        ];
    }
}
