@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.unitKerja.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.unit-kerjas.update", [$unitKerja->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nama_unit_kerja">{{ trans('cruds.unitKerja.fields.nama_unit_kerja') }}</label>
                            <input class="form-control" type="text" name="nama_unit_kerja" id="nama_unit_kerja" value="{{ old('nama_unit_kerja', $unitKerja->nama_unit_kerja) }}" required>
                            @if($errors->has('nama_unit_kerja'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_unit_kerja') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.unitKerja.fields.nama_unit_kerja_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">{{ trans('cruds.unitKerja.fields.keterangan') }}</label>
                            <input class="form-control" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $unitKerja->keterangan) }}">
                            @if($errors->has('keterangan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keterangan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.unitKerja.fields.keterangan_helper') }}</span>
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