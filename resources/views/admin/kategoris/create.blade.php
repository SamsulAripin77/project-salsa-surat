@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Buat Kategori</div>
        <div class="card-body">
            <form action="{{route('admin.kategoris.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul" class="required">Nama</label>
                    <input name="nama" type="text" class="form-control" placeholder="Nama Kategori" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
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