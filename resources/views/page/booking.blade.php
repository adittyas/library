@extends('layouts.app')

@section('content')
<!-- Header -->

<div class="header pb-8 pt-5 pt-md-8"
    style=" background-image: url({{ asset('images/icons/master-bg.jpg') }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-white">
                    {{ __('Booking Book') }}
                </h1>
            </div>
        </div>
    </div>

</div>
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                {{-- <h3 class="card-header bg-secondary border-0">
                    {{ __('Data user') }}
                </h3> --}}

                <div class="card-body px-0 table-responsive">
                    <table class="table align-items-center table-flush" id="bookings-table">
                        <thead class='thead-light'>
                            <tr>
                                <th></th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Member</th>
                                <th>End date</th>
                                <th>Late</th>
                                <th>Decision</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    @include('page.modal.booking')

    {{-- Excel modal --}}
    @include('page.modal.excel')

    @endsection
