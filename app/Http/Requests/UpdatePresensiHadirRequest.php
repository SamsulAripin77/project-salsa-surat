<?php

namespace App\Http\Requests;

use App\Models\PresensiHadir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePresensiHadirRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('presensi_hadir_edit');
    }

    public function rules()
    {
        return [
            'checktime' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'koordinat' => [
                'string',
                'nullable',
            ],
            'work_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
