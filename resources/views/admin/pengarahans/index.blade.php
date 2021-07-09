@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
    </div>
</div>
<div class="card"></div>        
    <div class="card-header">
        Pengarahan {{$label}}
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
                        @else 
                            <th>Penanggung Jawab</th>
                        @endif
                        <th>Penerima</th>
                        <th>Alamat</th>
                        <th>keterangan</th>
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
                        @else
                            <th>{{$item->penanggug_jawab ?? ''}}</th>
                        @endif
                        <td>{{$item->penerima ?? ''}}</td>
                        <td>{{$item->alamat ?? ''}}</td>
                        <td>
                            {{$item->keterangan}}
                        </td>
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
                                    {{ trans('global.edit') }}
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