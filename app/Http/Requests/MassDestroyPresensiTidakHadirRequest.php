<?php

namespace App\Http\Requests;

use App\Models\PresensiTidakHadir;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPresensiTidakHadirRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presensi_tidak_hadir_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:presensi_tidak_hadirs,id',
        ];
    }
}
