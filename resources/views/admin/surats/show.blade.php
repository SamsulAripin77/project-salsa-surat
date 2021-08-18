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
                        <th>{{$surat->updated_at->format('d/m/Y') ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>{{$surat->no_surat ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Kode Surat</th>
                        <th>{{$surat->kategoris->nama ?? ''}}</th>
                    </tr>
                    @if ($label == 'Surat Masuk')
                    <tr>
                        <th>Pengirim</th>
                        <th>{{$surat->pengirim ?? ''}}</th>
                    </tr>
                    @else 
                    <tr>
                        <th>Penanggung Jawab</th>
                        <th>{{$surat->penanggung_jawab ?? ''}}</th>
                    </tr>
                    @endif
                  
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
                        <th>Bidang</th>
                        <th>{{$surat->bidang ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>Status</th>

                        <th>
                            @if ($surat->status == 'pending')
                            <span class="badge badge-warning">{{$surat->status ?? ''}}</span>
                            @endif
                            @if ($surat->status == 'reject')
                            <span class="badge badge-danger">{{$surat->status ?? ''}}</span>
                            @endif
                            @if ($surat->status == 'accept')
                            <span class="badge badge-info">{{$surat->status ?? ''}}</span>
                            @endif
                            @if ($surat->status == 'replied')
                            <span class="badge badge-primary">{{$surat->status ?? ''}}</span>
                            @endif
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection