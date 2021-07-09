@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Detail Surat</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="form-group"><a href="{{route('admin.suratmasuks.index')}}" class="btn btn-default">Kembali</a></div>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Tanggal Surat</th>
                        <th>{{$surat->tgl_surat ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Tanggal Input</th>
                        <th>{{$surat->updated_at->diffForHumans() ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>{{$surat->no_surat ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Kode Surat</th>
                        <th>{{$surat->kategoris->nama}}</th>
                    </tr>
                    <tr>
                        <th>Pengirim</th>
                        <th>{{$surat->pengirim ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Penerima</th>
                        <th>{{$surat->penerima ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Lampiran</th>
                        <th><a href="{{Storage::url($surat->lampiran)}} " target="_blank">Lihat</a>
                    </tr>
                    <tr>
                        <th>Hal</th>
                        <th>{{$surat->hal ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>{{$surat->alamat ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <th>{{$surat->keterangan ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Status</th>

                        <th><span class="badge badge-warning">{{$surat->status ?? ''}}</span></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection