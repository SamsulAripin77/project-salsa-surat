@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Input Surat</div>
        <div class="card-body">
            @if ($label == 'Surat Masuk')
            <form action="{{route('admin.pengarahansuratmasuks.update', [$surat->id])}}" method="POST" enctype="multipart/form-data">
            @else 
            <form action="{{route('admin.pengarahansuratkeluars.update', [$surat->id])}}" method="POST" enctype="multipart/form-data">
            @endif
                @csrf
                @method('PUT')
                @can('pengarahan_edit_sekertaris')
                <div class="form-group">
                    <label class="required" for="pengirim">Penerima</label>
                    <input name="penerima" type="text" class="form-control" placeholder="Penerima" required>
                </div>
                <div class="form-group">
                    <label class="required" for="pengirim">Alamat</label>
                    <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                </div>
                @endcan
                @can('pengarahan_edit_petugas_arsip')
                <div class="form-group">
                    <label class="required" for="hal">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" placeholder="keterangan" required>
                </div>
                @if ($label == 'Surat Keluar')
                <div class="form-group">
                    <label class="required" for="hal">Penanggung Jawab</label>
                    <input name="penanggung_jawab" type="text" class="form-control" placeholder="penanggung_jawab" required>
                </div> 
                @endif
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