<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateClasse extends FormRequest
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
            'name' => 'required|unique:classes,name',
            'date_start' => 'required|before:tomorrow',
            'date_end' => 'required|after_or_equal:date_start',
            'subject' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Thông tin không được bỏ trống',
            'name.unique' => "Tên không được trùng",
            'date_start.required' => 'Thông tin không được bỏ trống',
            'date_start.before' => 'Kiểm tra lại ngày đã chọn',
            'date_end.required' => 'Thông tin không được bỏ trống',
            'date_end.after_or_equal' => "Kiểm tra lại ngày đã chọn",
            'subject.required' => 'Thông tin không được bỏ trống'
        ];

    }
}
