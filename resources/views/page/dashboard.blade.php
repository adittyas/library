@extends('layouts.app')

@section('content')
@include('layouts.partials.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @php
                    echo url()->current().'<br>';
                    echo url()->full().'<br>';
                    echo route('index.dashboard');
                    @endphp

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
