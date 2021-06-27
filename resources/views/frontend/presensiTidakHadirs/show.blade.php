@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.presensiTidakHadir.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.presensi-tidak-hadirs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiTidakHadir.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $presensiTidakHadir->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiTidakHadir.fields.cdate') }}
                                    </th>
                                    <td>
                                        {{ $presensiTidakHadir->cdate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiTidakHadir.fields.id_pegawai') }}
                                    </th>
                                    <td>
                                        {{ $presensiTidakHadir->id_pegawai->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiTidakHadir.fields.keterangan') }}
                                    </th>
                                    <td>
                                        {{ $presensiTidakHadir->keterangan->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiTidakHadir.fields.keterangan_lanjut') }}
                                    </th>
                                    <td>
                                        {{ $presensiTidakHadir->keterangan_lanjut }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.presensi-tidak-hadirs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection