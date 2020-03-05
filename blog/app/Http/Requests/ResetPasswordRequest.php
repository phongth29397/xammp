<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRequest extends FormRequest
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
            'new_password'=>'required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'new_password_confirm' => 'required|same:new_password|required_with:new_password|min:6',
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Mật Khẩu Cũ Không  Đúng');
                    }
                },
            ],
        ];
    }
    public function messages()
    {
        return [
            'old_password.required' => 'Yêu Cầu Phải Nhập',
            'new_password.required' => 'Yêu Cầu Phải Nhập',
            'new_password_confirm.required' => 'Yêu Cầu Phải Nhập',
            'new_password_confirm.min' => 'Mật khẩu phải dài hơn 8 kí tự',
            'new_password.min' => 'Mật khẩu phải dài hơn 8 kí tự',
            'new_password.regex' => 'Mật khẩu phải chứa một kí tự in',
            'new_password_confirm.same' => 'Xác nhận lại mật khẩu sai vui lòng nhập lại',
            'new_password_confirm.required_with' => 'Xác nhận lại mật khẩu sai vui lòng nhập lại',
        ];

    }
}
