@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('pengarahan_edit_sekertaris')
                Input Pengarahan Surat 
            @endcan
            @can('pengarahan_edit_petugas_arsip')
                Input Status Surat
            @endcan
        </div>
        <div class="card-body">
            @if ($label == 'Surat Masuk')
            <form action="{{route('admin.pengarahansuratmasuks.update', [$surat->id])}}" method="POST" enctype="multipart/form-data">
            @else 
            <form action="{{route('admin.pengarahansuratkeluars.update', [$surat->id])}}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf
                @method('PUT')
                @can('pengarahan_edit_sekertaris')
                @if ($label == 'Surat Keluar')
                <div class="form-group">
                    <label class="required" for="hal">Penanggung Jawab</label>
                    <input name="penanggung_jawab" type="text" class="form-control" placeholder="penanggung_jawab" required>
                </div> 
                @else 
                <div class="form-group">
                    <label class="required" for="roles">Penerima</label>
                    <select class="form-control select2 {{ $errors->has('penerima') ? 'is-invalid' : '' }}" name="penerima" id="penerima" required>
                        @foreach($penerimas as $penerima)
                            <option value="{{ $penerima->name }}" {{ old('penerima') ? 'selected' : '' }}>{{ $penerima->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('penerima'))
                        <div class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                </div>
                @endif
                <div class="form-group">
                    <label class="required" for="bidang">Bidang</label>
                    <input name="bidang" type="text" class="form-control" placeholder="Bidang" required>
                </div>
                <div class="form-group">
                    <label class="required" for="hal">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" placeholder="keterangan" required>
                </div>
                @endcan
                @can('pengarahan_edit_petugas_arsip')
                <div class="form-group">
                    <label class="required" for="status">Status</label>
                    <select name="status" id="kategori" class="form-control" required>
                        <option value="pending">Pending</option>
                        <option value="reject">Reject</option>
                        <option value="accept">Accept</option>
                    </select>
                </div>
                @endcan
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection