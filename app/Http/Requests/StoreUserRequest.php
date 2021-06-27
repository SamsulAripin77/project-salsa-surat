<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'username' => [
                'string',
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'tempat_lahir' => [
                'string',
                'nullable',
            ],
            'tanggal_lahir' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'no_tlp' => [
                'string',
                'max:13',
                'required',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
