<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|between:2,25|unique:users,name,' . Auth::user()->id,
            'email' => 'required|email',
            'introduction' => 'nullable|max:100',
            'WCAID' => 'nullable|regex:/^[A-Za-z0-9]*$/',
            'qq' => 'nullable|regex:/^[0-9]*$/',
            'stuNum' => 'nullable|regex:/^[A-Za-z0-9]*$/',
            'tel' => 'nullable|regex:/^[0-9]{11}$/',
            //13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名 已被占用，请重新填写',
            'name.between' => '用户名 必须介于 2 - 25 个字符之间。',
            'name.required' => '用户名 不能为空。',
            'introduction.max' => '个人简介 不能大于 :max 个字符。',
            'WCAID.regex' => 'WCA ID 不符合规范',
            'qq.regex' => 'QQ号码 不符合规范',
            'stuNum.regex' => '学号 不符合规范',
            'tel.regex' => '联系电话 不符合规范',
            'avatar.mimes' => '头像必须是 jpeg, bmp, png, gif 格式的图片',
            'avatar.dimensions' => '图片太小，宽和高需要 100 像素以上',
        ];
    }

}
