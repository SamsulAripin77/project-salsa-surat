@extends('layouts.admin')
@section('content')
@can('presensi_hadir_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.presensi-hadirs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.presensiHadir.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.presensiHadir.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PresensiHadir">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.presensiHadir.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.presensiHadir.fields.userid') }}
                        </th>
                        <th>
                            {{ trans('cruds.presensiHadir.fields.checktime') }}
                        </th>
                        <th>
                            {{ trans('cruds.presensiHadir.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.presensiHadir.fields.koordinat') }}
                        </th>
                        <th>
                            {{ trans('cruds.presensiHadir.fields.work_code') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($presensiHadirs as $key => $presensiHadir)
                        <tr data-entry-id="{{ $presensiHadir->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $presensiHadir->id ?? '' }}
                            </td>
                            <td>
                                {{ $presensiHadir->userid->name ?? '' }}
                            </td>
                            <td>
                                {{ $presensiHadir->checktime ?? '' }}
                            </td>
                            <td>
                                @if($presensiHadir->image)
                                    <a href="{{ $presensiHadir->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $presensiHadir->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $presensiHadir->koordinat ?? '' }}
                            </td>
                            <td>
                                {{ $presensiHadir->work_code ?? '' }}
                            </td>
                            <td>
                                @can('presensi_hadir_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.presensi-hadirs.show', $presensiHadir->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('presensi_hadir_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.presensi-hadirs.edit', $presensiHadir->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('presensi_hadir_delete')
                                    <form action="{{ route('admin.presensi-hadirs.destroy', $presensiHadir->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('presensi_hadir_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.presensi-hadirs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PresensiHadir:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection