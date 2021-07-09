@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Edit Kode</div>
        <div class="card-body">
            <form action="{{route('admin.kategoris.update',[$kategori->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul" class="required">Kode</label>
                    <input name="nama" type="text" class="form-control" placeholder="Nama Kategori" value="{{old('nama', $kategori->nama)}}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" 
                    value="{{old('keterangan', $kategori->keterangan)}}"
                    placeholder="Keterangan">
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