<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'post_title' => 'required|string|max:100',
            'post_body' => 'required|string|max:5000',
        ];
    }

    public function messages(){
        return [
            'post_title.required' => 'タイトルは必須項目です。',
            'post_title.string' => '文字列型で入力してください。',
            'post_title.max' => 'タイトルの最大文字数は100文字です。',
            'post_body.required' => '投稿内容は必須項目です。',
            'post_body.string' => '文字列型で入力してください。',
            'post_body.max' => '投稿の最大文字数は5000文字です。',
        ];
    }
}
