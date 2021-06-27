@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jadwal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jadwals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.id') }}
                        </th>
                        <td>
                            {{ $jadwal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.hari') }}
                        </th>
                        <td>
                            {{ App\Models\Jadwal::HARI_SELECT[$jadwal->hari] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.id_shift') }}
                        </th>
                        <td>
                            {{ $jadwal->id_shift->nama_shift ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jadwals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection