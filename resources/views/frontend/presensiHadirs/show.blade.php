@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.presensiHadir.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.presensi-hadirs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiHadir.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $presensiHadir->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiHadir.fields.userid') }}
                                    </th>
                                    <td>
                                        {{ $presensiHadir->userid->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiHadir.fields.checktime') }}
                                    </th>
                                    <td>
                                        {{ $presensiHadir->checktime }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiHadir.fields.image') }}
                                    </th>
                                    <td>
                                        @if($presensiHadir->image)
                                            <a href="{{ $presensiHadir->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $presensiHadir->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiHadir.fields.koordinat') }}
                                    </th>
                                    <td>
                                        {{ $presensiHadir->koordinat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.presensiHadir.fields.work_code') }}
                                    </th>
                                    <td>
                                        {{ $presensiHadir->work_code }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.presensi-hadirs.index') }}">
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