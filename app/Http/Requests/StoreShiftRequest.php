<?php

namespace App\Http\Requests;

use App\Models\Shift;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShiftRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shift_create');
    }

    public function rules()
    {
        return [
            'nama_shift' => [
                'string',
                'required',
            ],
            'checkin' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'checkout' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'smsin' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'smsout' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'is_over_time' => [
                'string',
                'nullable',
            ],
        ];
    }
}
