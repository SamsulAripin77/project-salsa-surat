@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shift.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.id') }}
                        </th>
                        <td>
                            {{ $shift->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.nama_shift') }}
                        </th>
                        <td>
                            {{ $shift->nama_shift }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.checkin') }}
                        </th>
                        <td>
                            {{ $shift->checkin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.checkout') }}
                        </th>
                        <td>
                            {{ $shift->checkout }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.smsin') }}
                        </th>
                        <td>
                            {{ $shift->smsin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.smsout') }}
                        </th>
                        <td>
                            {{ $shift->smsout }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.is_over_time') }}
                        </th>
                        <td>
                            {{ $shift->is_over_time }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection