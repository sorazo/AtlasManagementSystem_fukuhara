<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'main_category_id' => 'required|exists:main_categories,id',
            'sub_category_name' => 'required|string|max:100|unique:sub_categories,sub_category',
        ];
    }

    public function messages(){
        return [
            'main_category_id.required' => 'メインカテゴリーは必須項目です。',
            'main_category_id.exists' => 'そのメインカテゴリーは登録されていません。',
            'sub_category_name.required' => 'サブカテゴリーは必須項目です。',
            'sub_category_name.string' => '文字列型で入力してください。',
            'sub_category_name.max' => '最大文字数は100文字です。',
            'sub_category_name.unique' => 'そのカテゴリーは既に登録されています。',
        ];
    }
}
