@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hariLibur.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hari-liburs.update", [$hariLibur->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tgl">{{ trans('cruds.hariLibur.fields.tgl') }}</label>
                <input class="form-control date {{ $errors->has('tgl') ? 'is-invalid' : '' }}" type="text" name="tgl" id="tgl" value="{{ old('tgl', $hariLibur->tgl) }}">
                @if($errors->has('tgl'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgl') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hariLibur.fields.tgl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.hariLibur.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $hariLibur->keterangan) }}">
                @if($errors->has('keterangan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hariLibur.fields.keterangan_helper') }}</span>
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