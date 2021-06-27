<?php

namespace App\Http\Requests;

use App\Models\PresensiTidakHadir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePresensiTidakHadirRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('presensi_tidak_hadir_edit');
    }

    public function rules()
    {
        return [
            'cdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'keterangan_lanjut' => [
                'string',
                'nullable',
            ],
        ];
    }
}
