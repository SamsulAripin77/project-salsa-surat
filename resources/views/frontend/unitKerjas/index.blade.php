@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('unit_kerja_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.unit-kerjas.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.unitKerja.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.unitKerja.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-UnitKerja">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.unitKerja.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.unitKerja.fields.nama_unit_kerja') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.unitKerja.fields.keterangan') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unitKerjas as $key => $unitKerja)
                                    <tr data-entry-id="{{ $unitKerja->id }}">
                                        <td>
                                            {{ $unitKerja->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $unitKerja->nama_unit_kerja ?? '' }}
                                        </td>
                                        <td>
                                            {{ $unitKerja->keterangan ?? '' }}
                                        </td>
                                        <td>
                                            @can('unit_kerja_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.unit-kerjas.show', $unitKerja->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('unit_kerja_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.unit-kerjas.edit', $unitKerja->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('unit_kerja_delete')
                                                <form action="{{ route('frontend.unit-kerjas.destroy', $unitKerja->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('unit_kerja_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.unit-kerjas.massDestroy') }}",
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
  let table = $('.datatable-UnitKerja:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection