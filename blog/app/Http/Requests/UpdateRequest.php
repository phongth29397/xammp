<?php

namespace App\Http\Requests;


use App\User;use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role === User::ROLE_MANAGER ) {
            return true;
        }elseif (Auth::user()->id == $this->all()['id']){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'nullable|date',


        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Họ Và Tên Đệm Là Bắt Buộc ',
            'last_name.required' => 'Tên Là Bắt Buộc',
            'birthday.required' => 'Ngày Sinh Là Bắt Buộc',
            'avatar.required' => 'Ảnh Đại Diện Là Bắt Buộc',
            'address.' => 'Địa Chỉ Là Bắt Buộc',
        ];

    }
}
