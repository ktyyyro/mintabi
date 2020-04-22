<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelBrochureRequest extends FormRequest
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
            'destination' => 'required|string',
            'members' => 'nullable|string',
            'travel_items' => 'nullable|string',
            'remark' => 'nullable|string',
        ];
    }

    /**
     * TODO:日付をまとめてエラー出すようにしたい
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'destination' => '行き先',
            'members' => 'メンバー',
            'date_Y' => '日付',
            'travel_items' => '持ち物',
            'remark' => '備考',
        ];
    }
}
