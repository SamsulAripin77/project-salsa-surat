@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.shift.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shifts.update", [$shift->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama_shift">{{ trans('cruds.shift.fields.nama_shift') }}</label>
                <input class="form-control {{ $errors->has('nama_shift') ? 'is-invalid' : '' }}" type="text" name="nama_shift" id="nama_shift" value="{{ old('nama_shift', $shift->nama_shift) }}" required>
                @if($errors->has('nama_shift'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_shift') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.nama_shift_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="checkin">{{ trans('cruds.shift.fields.checkin') }}</label>
                <input class="form-control timepicker {{ $errors->has('checkin') ? 'is-invalid' : '' }}" type="text" name="checkin" id="checkin" value="{{ old('checkin', $shift->checkin) }}">
                @if($errors->has('checkin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('checkin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.checkin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="checkout">{{ trans('cruds.shift.fields.checkout') }}</label>
                <input class="form-control timepicker {{ $errors->has('checkout') ? 'is-invalid' : '' }}" type="text" name="checkout" id="checkout" value="{{ old('checkout', $shift->checkout) }}">
                @if($errors->has('checkout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('checkout') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.checkout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="smsin">{{ trans('cruds.shift.fields.smsin') }}</label>
                <input class="form-control timepicker {{ $errors->has('smsin') ? 'is-invalid' : '' }}" type="text" name="smsin" id="smsin" value="{{ old('smsin', $shift->smsin) }}">
                @if($errors->has('smsin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('smsin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.smsin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="smsout">{{ trans('cruds.shift.fields.smsout') }}</label>
                <input class="form-control timepicker {{ $errors->has('smsout') ? 'is-invalid' : '' }}" type="text" name="smsout" id="smsout" value="{{ old('smsout', $shift->smsout) }}">
                @if($errors->has('smsout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('smsout') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.smsout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="is_over_time">{{ trans('cruds.shift.fields.is_over_time') }}</label>
                <input class="form-control {{ $errors->has('is_over_time') ? 'is-invalid' : '' }}" type="text" name="is_over_time" id="is_over_time" value="{{ old('is_over_time', $shift->is_over_time) }}">
                @if($errors->has('is_over_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_over_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.is_over_time_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection