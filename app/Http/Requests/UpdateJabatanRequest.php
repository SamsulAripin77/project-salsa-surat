<?php

namespace App\Http\Requests;

use App\Models\Jabatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJabatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jabatan_edit');
    }

    public function rules()
    {
        return [
            'nama_jabatan' => [
                'string',
                'required',
            ],
        ];
    }
}
