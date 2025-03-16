<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'reservation_date' => 'required|after_or_equal:today',
            'reservation_time' => 'required',
            'number_of_people' => 'required',
            'course_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'reservation_date.required' => '日にちを選択してください',
            'reservation_date.after_or_equal' => '過去の日時は選択できません',
            'reservation_time.required' => '時間を選択してください',
            'number_of_people.required' => '人数を選択してください',
            'course_id.required' => 'コースを選択してください'
        ];
    }
    public function withValidator($validator) {
        $validator->after(function ($validator) {
            $date = $this->input('reservation_date');
            $time = $this->input('reservation_time');

            if($date && $time) {
                $reservationDateTime = Carbon::parse("$date $time");
                if($reservationDateTime->lessThan(now())) {
                    $validator->errors()->add('reservation_date', '過去の日時は選択できません');
                }
            }
        });
    }
}
