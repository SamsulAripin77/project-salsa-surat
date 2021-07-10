@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Input Surat</div>
        <div class="card-body">
            @if ($label == 'Surat Masuk')
            <form action="{{route('admin.suratmasuks.store')}}" method="POST" enctype="multipart/form-data">
            @else 
            <form action="{{route('admin.suratkeluars.store')}}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="form-group">
                    <label class="required" for="kategori_id">Kode Surat</label>
                    <select name="kategori_id" id="kategori" class="form-control" required>
                        @foreach ($kategoris as $id => $item)
                            <option value="{{ $id }}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="required" for="pengirim">No Surat</label>
                    <input name="no_surat" type="text" class="form-control" placeholder="Nomor Surat" required>
                </div>
                <div class="form-group">
                    <label for="tgl_surat" class="required">Tanggal Surat</label>
                    <input name="tgl_surat" type="text" class="form-control date" placeholder="Tanggal Surat" required>
                </div>
                @if ($label == 'Surat Masuk')
                <div class="form-group">
                    <label class="required" for="pengirim">pengirim</label>
                    <input name="pengirim" type="text" class="form-control" placeholder="pengirim" required>
                </div>
                @endif
                <div class="form-group">
                    <label class="required" for="hal">Perihal</label>
                    <input name="hal" type="text" class="form-control" placeholder="hal" required>
                </div>
              
                <div class="form-group">
                    <label class="required" for="pengirim">lampiran</label>
                    <input name="lampiran" type="file" class="form-control" placeholder="lampiran" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection