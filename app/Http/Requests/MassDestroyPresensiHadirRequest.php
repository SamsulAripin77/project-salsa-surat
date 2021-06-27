<?php

namespace App\Http\Requests;

use App\Models\PresensiHadir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPresensiHadirRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presensi_hadir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:presensi_hadirs,id',
        ];
    }
}
