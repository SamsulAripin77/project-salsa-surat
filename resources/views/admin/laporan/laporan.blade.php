@extends('layouts.admin')
@section('content')
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<div class="card"></div>        
    <div class="card-header">
        laporan {{$label}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped table-hover datatable datatable-laporan">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Surat</th>
                        <th>No Surat</th>
                        @if ($label == 'Surat Masuk')
                            <th>Pengirim</th>
                        @else 
                            <th>Penanggung Jawab</th>
                        @endif
                        <th>Penerima</th>
                        <th>Hal</th>
                        <th>Kode Surat</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach ($surats as $key =>$item)
                    <tr>
                        <td>
                            {{$no++}}
                        </td>
                        <td>{{$item->updated_at->format('d/m/Y') ?? ''}}</td>
                        <td>{{$item->tgl_surat ?? ''}}</td> 
                        <td>{{$item->no_surat ?? ''}}</td>
                        @if ($label == 'Surat Masuk')
                             <td>{{$item->pengirim ?? ''}}</td>
                        @else 
                             <td>{{$item->penanggug_jawab ?? ''}}</td>
                        @endif
                        <td>{{$item->penerima ?? ''}}</td>
                        <td>{{$item->hal ?? ''}}</td>
                        <td>{{$item->kategoris->nama ?? ''}}</td>
                        <td>{{$item->alamat ?? ''}}</td>
                        <td>{{$item->keterangan ?? ''}}</td>
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
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                            <th>No</th>
                            <th>Tanggal Input</th>
                            <th>Tanggal Surat</th>
                            <th>No Surat</th>
                            @if ($label == 'Surat Masuk')
                                <th>Pengirim</th>
                            @else 
                                <th>Penanggung Jawab</th>
                            @endif
                            <th>Penerima</th>
                            <th>Hal</th>
                            <th>Kode Surat</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
  
        </div>
    </div>
</div>
@endsection



@section('scripts')
@parent
<script>
$(function () {
    let label = {!! json_encode($label) !!};
    console.log(label);
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
  let table = $('.datatable-laporan:not(.ajaxTable)').DataTable({
    initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
    dom: 'Bfrtip',
    buttons: [
        @can('pengarahan_edit_petugas_arsip')
        {extend: 'pdf', text:'Export PDF', title: '' + label, className: 'btn-danger',customize: function ( doc ) {
        doc.content.push({text:'Mengetahui',margin:[240,20,20,20]});
        doc.content.push({text:'Sekertaris',margin:[240,-20,20,20]});
        doc.content.push({text:'(........................................)',margin:[210,40,20,20]});
        doc.content.push({text:'(........................................)',margin:[380,-30,20,20]});
        doc.content.push({text:'Petugas Arsip' ,margin:[400,-110,20,20]});
        }},
        {extend: 'excel', text: 'Export Excel', title: 'laporan' + label, className: 'btn-info',}
        @endcan
    ]  })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection