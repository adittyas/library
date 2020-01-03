@extends('layouts.app')

@section('content')
@include('layouts.partials.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Booking Activity</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @php
                    // echo url()->current().'<br>';
                    // echo url()->full().'<br>';
                    @endphp
                    <canvas id="myChart" height="400" style='width: 100%;'></canvas>
                    {{-- <canvas id="myMember" height="400" style='width: 100%;'></canvas> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptFoot')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    // var ctm = document.getElementById('myMember').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:  {!! json_encode($months) !!} ,
        datasets: [{
            label: 'Member Dataset',
            data: {!! json_encode($mil) !!},
            backgroundColor: 'rgba(0, 0, 0, 0)',
            borderColor: 'rgba(255,99,0,0.8)'
        }, {
            label: 'Transaction Dataset',
            data: {!! json_encode($cil) !!},
            backgroundColor: 'rgba(0, 0, 0, 0)',
            borderColor: 'rgba(22,255,255,0.8)'
        },{
            label: 'Book Dataset',
            data: {!! json_encode($bil) !!},
            backgroundColor: 'rgba(0, 0, 0, 0)',
            borderColor: 'rgba(22,0,255,0.8)'
        },{
            label: 'Guest Dataset',
            data: {!! json_encode($xil) !!},
            backgroundColor: 'rgba(0, 0, 0, 0)',
            borderColor: 'rgba(22,0,22,0.8)'
        }],
    },
    options: {
    title: {
    display: true,
    text: 'Transaction activity'
    }
    }
});
// var myMem = new Chart(ctm, {
//     type: 'line',
//     data: {
//         labels:  {!! json_encode($months) !!} ,
//         datasets: [{
//             label: 'Bar Dataset',
//             data: [5, 1, 3, 7,8, 3, 3, 7, 2,10, 3,4],
//             backgroundColor: 'rgba(0, 0, 0, 0)',
//             borderColor: 'rgba(255,99,0,0.8)'
//         }, {
//             label: 'Line Dataset',
//             data: {!! json_encode($cil) !!},
//             backgroundColor: 'rgba(0, 0, 0, 0)',
//             borderColor: 'rgba(22,255,255,0.8)'
//         }],
//     },
//     options: {
//         title: {
//             display: true,
//             text: 'Member growth'
//             }
//     }
// });
</script>
@endsection
