@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.unitKerja.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.unit-kerjas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.unitKerja.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $unitKerja->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.unitKerja.fields.nama_unit_kerja') }}
                                    </th>
                                    <td>
                                        {{ $unitKerja->nama_unit_kerja }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.unitKerja.fields.keterangan') }}
                                    </th>
                                    <td>
                                        {{ $unitKerja->keterangan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.unit-kerjas.index') }}">
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