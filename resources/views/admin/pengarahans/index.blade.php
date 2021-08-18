@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
    </div>
</div>
<div class="card"></div>        
    <div class="card-header">
        @if (Auth::user()->can('penerima'))
            Surat Masuk
        @else
            Pengarahan {{$label}}
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-surat-masuk">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        @if ($label == 'Surat Masuk')
                            <th>Pengirim</th>
                            <th>Penerima</th>
                        @else 
                            <th>Penanggung Jawab</th>
                        @endif
                        <th>Bidang</th>
                        <th>keterangan</th>
                        @if ($label == 'Surat Masuk')
                        <th>Tanggapan Penerima</th>
                        @endif
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $key =>$item)
                    <tr>
                        <td>
                            {{$surats->firstItem() + $key}}
                        </td>
                        <td>{{$item->no_surat ?? ''}}</td>
                        @if ($label == 'Surat Masuk')
                            <th>{{$item->pengirim ?? ''}}</th>
                            <td>{{$item->penerima ?? ''}}</td>
                        @else
                            <th>{{$item->penanggung_jawab ?? ''}}</th>
                        @endif
                        <td>{{$item->bidang ?? ''}}</td>
                        <td>
                            {{$item->keterangan}}
                        </td>
                        @if ($label == 'Surat Masuk')
                        <td>{{$item->comment ?? ''}}</td>
                        @endif
                        <td>
                            @if ($item->status == 'pending')
                                <span class="badge badge-warning">{{$item->status ?? ''}}</span>
                            @endif
                            @if ($item->status == 'reject')
                                <span class="badge badge-danger">{{$item->status ?? ''}}</span>
                            @endif
                            @if ($item->status == 'accept')
                                <span class="badge badge-info">{{$item->status ?? ''}}</span>
                            @endif
                            @if ($item->status == 'replied')
                            <span class="badge badge-primary">{{$item->status ?? ''}}</span>
                            @endif
                        </td>
                        <td>
                   
                            @if ($label == 'Surat Masuk')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.pengarahansuratmasuks.show', $item) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @else
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.pengarahansuratkeluars.show', $item) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endif
                                @if ($label == 'Surat Masuk')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.pengarahansuratmasuks.edit', $item->id) }}">
                                     @if (Auth::user()->can('penerima'))
                                         Balas
                                     @else
                                        {{ trans('global.edit') }}
                                     @endif
                                </a>
                                @else
                                <a class="btn btn-xs btn-info" href="{{ route('admin.pengarahansuratkeluars.edit', $item->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$surats->links()}}
        </div>
    </div>
</div>
@endsection