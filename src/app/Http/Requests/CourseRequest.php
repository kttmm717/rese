<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'コース名を入力してください',
            'price.required' => 'コース価格を入力してください',
            'price.integer' => '数値を入力してください',
            'price.min' => 'コース価格は1円以上で入力してください',
        ];
    }
}
