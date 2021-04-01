<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'タイトル',
            'due_date' => '期限日',
        ];
    }

    public function message():array
    {
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。'
        ];
    }

}
