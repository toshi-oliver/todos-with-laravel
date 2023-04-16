<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
         return [
             'title' => 'required|max:100',
             'due_date' => 'required|date|after_or_equal:today',
         ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => ' タイトル',
            'due_date' => ' 期限日',
        ];
    }

    public function messages()
    {
        // キーでメッセージが表示されるべきルールを指定する。
        // ドット区切りで左側が項目、右側がルールを意味する
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }


}
