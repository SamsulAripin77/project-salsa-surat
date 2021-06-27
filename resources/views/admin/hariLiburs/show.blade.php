@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hariLibur.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hari-liburs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hariLibur.fields.id') }}
                        </th>
                        <td>
                            {{ $hariLibur->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hariLibur.fields.tgl') }}
                        </th>
                        <td>
                            {{ $hariLibur->tgl }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hariLibur.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $hariLibur->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hari-liburs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection