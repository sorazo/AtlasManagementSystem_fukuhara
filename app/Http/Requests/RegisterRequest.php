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
            'old_date' => 'required|date_format:Y-m-d|after:1999-12-31|before:tomorrow',
            'role' => 'required',
            'password' => 'required|min:8|max:30|confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }


        protected function prepareForValidation()
    {
        $old_date = ($this->filled(['old_year', 'old_month', 'old_day'])) ? $this->old_year .'-'. $this->old_month .'-'. $this->old_day : '';
        $this->merge([
        'old_date' => $old_date
        ]);
        // dd($old_date);
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
            'old_date.required' => '生年月日は必須項目です。',
            'old_date.date_format' => '正しい日付で入力してください。',
            'old_date.after' => '2000年1月1日以降で入力してください。',
            'old_date.before' => '今日まで入力してください。',
            'role.required' => '権限は必須項目です。',
            'password.required' => 'パスワードは必須項目です。',
            'password.max' => 'パスワードは30文字以内入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }

}
