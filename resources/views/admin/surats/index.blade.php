@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        @if ($label == 'Surat Masuk')
        <a class="btn btn-success" href="{{ route('admin.suratmasuks.create') }}">
            Input Surat
        </a>
        @else
        <a class="btn btn-success" href="{{ route('admin.suratkeluars.create') }}">
            Input Surat
        </a>
        @endif
    </div>
</div>
<div class="card"></div>        
    <div class="card-header">
        Daftar {{$label}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-surat-masuk">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Surat</th>
                        <th>No Surat</th>
                        @if ($label == 'Surat Masuk')
                            <th>Pengirim</th>
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
                        <td>{{$item->updated_at->format('d/m/Y') ?? ''}}</td>
                        <td>{{$item->tgl_surat ?? ''}}</td> 
                        <td>{{$item->no_surat ?? ''}}</td>
                        @if ($label == 'Surat Masuk')
                             <td>{{$item->pengirim ?? ''}}</td>
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
                        </td>
                        <td>
                            @if ($label == 'Surat Masuk')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.suratmasuks.show', $item) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @else
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.suratkeluars.show', $item) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endif
                                @if ($label == 'Surat Masuk')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.suratmasuks.edit', $item->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @else
                                <a class="btn btn-xs btn-info" href="{{ route('admin.suratkeluars.edit', $item->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endif
                            @if ($label == 'Surat Masuk')
                            <form action="{{ route('admin.suratmasuks.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            @else
                            <form action="{{ route('admin.suratkeluars.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            @endif
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
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