<?php

namespace App\Http\Requests;

use App\Models\Jabatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJabatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jabatan_create');
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
