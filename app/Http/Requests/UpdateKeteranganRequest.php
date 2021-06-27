<?php

namespace App\Http\Requests;

use App\Models\Keterangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKeteranganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('keterangan_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'nullable',
            ],
            'kode' => [
                'string',
                'nullable',
            ],
        ];
    }
}
