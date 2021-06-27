@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.keterangan.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.keterangans.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nama">{{ trans('cruds.keterangan.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', '') }}">
                            @if($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.keterangan.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kode">{{ trans('cruds.keterangan.fields.kode') }}</label>
                            <input class="form-control" type="text" name="kode" id="kode" value="{{ old('kode', '') }}">
                            @if($errors->has('kode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.keterangan.fields.kode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="denda">{{ trans('cruds.keterangan.fields.denda') }}</label>
                            <input class="form-control" type="number" name="denda" id="denda" value="{{ old('denda', '') }}" step="0.01">
                            @if($errors->has('denda'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('denda') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.keterangan.fields.denda_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection