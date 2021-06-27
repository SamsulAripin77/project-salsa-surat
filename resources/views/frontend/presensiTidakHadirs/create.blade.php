@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.presensiTidakHadir.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.presensi-tidak-hadirs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="cdate">{{ trans('cruds.presensiTidakHadir.fields.cdate') }}</label>
                            <input class="form-control date" type="text" name="cdate" id="cdate" value="{{ old('cdate') }}">
                            @if($errors->has('cdate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cdate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiTidakHadir.fields.cdate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="id_pegawai_id">{{ trans('cruds.presensiTidakHadir.fields.id_pegawai') }}</label>
                            <select class="form-control select2" name="id_pegawai_id" id="id_pegawai_id">
                                @foreach($id_pegawais as $id => $entry)
                                    <option value="{{ $id }}" {{ old('id_pegawai_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_pegawai'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_pegawai') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiTidakHadir.fields.id_pegawai_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_id">{{ trans('cruds.presensiTidakHadir.fields.keterangan') }}</label>
                            <select class="form-control select2" name="keterangan_id" id="keterangan_id">
                                @foreach($keterangans as $id => $entry)
                                    <option value="{{ $id }}" {{ old('keterangan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('keterangan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keterangan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiTidakHadir.fields.keterangan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_lanjut">{{ trans('cruds.presensiTidakHadir.fields.keterangan_lanjut') }}</label>
                            <input class="form-control" type="text" name="keterangan_lanjut" id="keterangan_lanjut" value="{{ old('keterangan_lanjut', '') }}">
                            @if($errors->has('keterangan_lanjut'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keterangan_lanjut') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiTidakHadir.fields.keterangan_lanjut_helper') }}</span>
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