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
            'name' => 'required|string|max:10',
            'name_kana' => 'required|string|katakana|max:30',
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

        $name = ($this->filled(['over_name', 'under_name'])) ? $this->over_name .''. $this->under_name : '';
        $this->merge([
        'name' => $name
        ]);

        $name_kana = ($this->filled(['over_name_kana', 'under_name_kana'])) ? $this->over_name_kana .''. $this->under_name_kana : '';
        $this->merge([
        'name_kana' => $name_kana
        ]);
    }

    public function messages(){
        return[
            'name.required' => '名前は必須項目です。',
            'name.string' => '文字列で入力してください。',
            'name.max' => '10文字以下で入力してください。',
            'name_kana.required' => 'カタカナは必須項目です。',
            'name_kana.string' => '文字列で入力してください。',
            'name_kana.max' => '30文字以下で入力してください。',
            'name_kana.katakana' => 'カタカナで入力してください。',
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
