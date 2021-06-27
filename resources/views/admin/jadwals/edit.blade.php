@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jadwal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jadwals.update", [$jadwal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.jadwal.fields.hari') }}</label>
                <select class="form-control {{ $errors->has('hari') ? 'is-invalid' : '' }}" name="hari" id="hari">
                    <option value disabled {{ old('hari', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Jadwal::HARI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hari', $jadwal->hari) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hari'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hari') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.hari_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_shift_id">{{ trans('cruds.jadwal.fields.id_shift') }}</label>
                <select class="form-control select2 {{ $errors->has('id_shift') ? 'is-invalid' : '' }}" name="id_shift_id" id="id_shift_id">
                    @foreach($id_shifts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_shift_id') ? old('id_shift_id') : $jadwal->id_shift->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_shift'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_shift') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jadwal.fields.id_shift_helper') }}</span>
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