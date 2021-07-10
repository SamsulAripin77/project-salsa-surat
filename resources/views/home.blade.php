@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Dashboard
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12 text-center">
                                <h1><i class="fa fa-envelope"></i></h1>
                                <h3>Surat Masuk</h3>
                                <h4>{{$masukCount}}</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 text-center">
                                <h1><i class="fa fa-envelope-open"></i></h1>
                                <h3>Surat Keluar</h3>
                                <h4>{{$keluarCount}}</h4>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    let masukCount = {!! json_encode($masukCount) !!};
    let keluarCount = {!! json_encode($keluarCount) !!};
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Surat Masuk','Surat Keluar'],
            datasets: [{
                label: 'Grafik Surat',
                data: [masukCount, keluarCount],
                backgroundColor: [
                    '#e74c3c',
                    '#3498db',
                ],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: Math.max(masukCount,keluarCount) + 5,
                }
            }
        }
    });
    </script>
@endsection