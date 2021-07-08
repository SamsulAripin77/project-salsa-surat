@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.suratmasuks.create') }}">
            Input Surat
        </a>
    </div>
</div>
<div class="card"></div>        
    <div class="card-header">
        Daftar Surat Masuk
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-surat-masuk">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Surat</th>
                        <th>No Surat</th>
                        <th>Pengirim</th>
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
                        <td>{{$item->tgl_surat}}</td>
                        <td>{{$item->no_surat}}</td>
                        <td>{{$item->pengirim}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            @can('keterangan_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.suratmasuks.edit', $item->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('keterangan_delete')
                                <form action="{{ route('admin.suratmasuks.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            @endcan
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