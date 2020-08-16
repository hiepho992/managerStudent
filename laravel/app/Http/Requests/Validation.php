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
        'dateOfBirth' => "required|before:tomorrow",
        'gender' => "required",
        'nation' => "required",
        'phone' => "required|regex:/^(0)[0-9]{9}/|size:10",
        'email' => "required|email",
        'address' => "required",
        'specialize' => "required",
        'classe' => "required",
        'salary' => "required|min:0|max:9",
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
            'phone.size' => "Thông tin phải 10 số",
            'email.required' => "Bạn chưa nhập thông tin",
            'email.email' => "Thông tin chưa đúng",
            'address.required' => "Bạn chưa nhập thông tin",
            'specialize.required' => "Bạn chưa nhập thông tin",
            'classe.required' => "Bạn chưa nhập thông tin",
            'salary.required' => "Bạn chưa nhập thông tin",
            'salary.max' => "Giới hạn 9 số",
            'salary.min' => "Thông tin không được âm",
        ];
    }
}
