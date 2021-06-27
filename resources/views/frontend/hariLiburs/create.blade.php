@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.hariLibur.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.hari-liburs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="tgl">{{ trans('cruds.hariLibur.fields.tgl') }}</label>
                            <input class="form-control date" type="text" name="tgl" id="tgl" value="{{ old('tgl') }}">
                            @if($errors->has('tgl'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.hariLibur.fields.tgl_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">{{ trans('cruds.hariLibur.fields.keterangan') }}</label>
                            <input class="form-control" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', '') }}">
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

        </div>
    </div>
</div>
@endsection