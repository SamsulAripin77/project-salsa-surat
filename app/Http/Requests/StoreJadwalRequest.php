<?php

namespace App\Http\Requests;

use App\Models\Jadwal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJadwalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jadwal_create');
    }

    public function rules()
    {
        return [];
    }
}
