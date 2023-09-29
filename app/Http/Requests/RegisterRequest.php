<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|katakana|max:30',
            'under_name_kana' => 'required|string|katakana|max:30',
            'mail_address' => 'required|email|max:100|unique:users,mail_address',
            'sex' => 'required',
            'old_year' => 'required|after:1999-12-31|before:tomorrow',
            'old_month' => 'required',
            'old_day' => 'required',
            'role' => 'required',
            'password' => 'required|min:8|max:30|confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages(){
        return[
        'over_name.required' => '姓は必須項目です。',
            'over_name.string' => '文字列で入力してください。',
            'over_name.max' => '10文字以下で入力してください。',
            'under_name.required' => '名は必須項目です。',
            'under_name.string' => '文字列で入力してください。',
            'under_name.max' => '10文字以下で入力してください。',
            'over_name_kana.required' => 'セイは必須項目です。',
            'over_name_kana.string' => '文字列で入力してください。',
            'over_name_kana.max' => '30文字以下で入力してください。',
            'over_name_kana.katakana' => 'カタカナで入力してください。',
            'under_name_kana.required' => 'メイは必須項目です。',
            'under_name_kana.string' => '文字列で入力してください。',
            'under_name_kana.max' => '30文字以下で入力してください。',
            'under_name_kana.katakana' => 'カタカナで入力してください。',
            'mail_address.required' => 'メールアドレスは必須項目です。',
            'mail_address.email' => 'メールアドレスの形式で入力してください。',
            'mail_address.max' => '100文字で入力してください。',
            'mail_address.unique' => '登録済みのメールアドレスです。',
            'sex.required' => '性別は必須項目です。',
            'old_year.required' => '年は必須項目です。',
            'old_year.date' => '正しい年で入力してください。',
            'old_year.after' => '2000年以降で入力してください。',
            'old_year.before' => '今日まで入力してください。',
            'old_month.required' => '月は必須項目です。',
            'old_month.data' => '正しい月で入力してください。',
            'old_month.after' => '2000年以降で入力してください。',
            'old_month.before' => '今日まで入力してください。',
            'old_day.required' => '日は必須項目です。',
            'old_day.data' => '正しい日で入力してください。',
            'old_day.after' => '2000年以降で入力してください。',
            'old_day.before' => '今日まで入力してください。',
            'role.required' => '権限は必須項目です。',
            'password.required' => 'パスワードは必須項目です。',
            'password.max' => 'パスワードは30文字以内入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }

}
