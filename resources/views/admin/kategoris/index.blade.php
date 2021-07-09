@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.kategoris.create') }}">
            Buat kategori
        </a>
    </div>
</div>
<div class="card"></div>        
    <div class="card-header">
        Daftar Kode
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-kategori">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $key =>$item)
                    <tr>
                        <td>
                            {{$kategoris->firstItem() + $key}}
                        </td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>
                            @can('keterangan_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.kategoris.edit', $item->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('keterangan_delete')
                                <form action="{{ route('admin.kategoris.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            {{$kategoris->links()}}
        </div>
    </div>
</div>
@endsection