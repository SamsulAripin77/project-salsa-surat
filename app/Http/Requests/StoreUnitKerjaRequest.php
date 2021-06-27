<?php

namespace App\Http\Requests;

use App\Models\UnitKerja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUnitKerjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unit_kerja_create');
    }

    public function rules()
    {
        return [
            'nama_unit_kerja' => [
                'string',
                'required',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
