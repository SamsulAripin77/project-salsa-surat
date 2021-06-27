<?php

namespace App\Http\Requests;

use App\Models\Keterangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKeteranganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('keterangan_create');
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
