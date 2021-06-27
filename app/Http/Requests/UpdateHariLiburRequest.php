<?php

namespace App\Http\Requests;

use App\Models\HariLibur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHariLiburRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hari_libur_edit');
    }

    public function rules()
    {
        return [
            'tgl' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
