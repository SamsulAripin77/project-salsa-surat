@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jabatan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jabatans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_jabatan">{{ trans('cruds.jabatan.fields.nama_jabatan') }}</label>
                <input class="form-control {{ $errors->has('nama_jabatan') ? 'is-invalid' : '' }}" type="text" name="nama_jabatan" id="nama_jabatan" value="{{ old('nama_jabatan', '') }}" required>
                @if($errors->has('nama_jabatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_jabatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jabatan.fields.nama_jabatan_helper') }}</span>
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