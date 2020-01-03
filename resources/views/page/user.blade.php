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
                    {{ __('Data user') }}
                </h1>
            </div>
            <div class="col-lg-6 text-right">
                <a id='new-user' href='#' title='Add new user'
                    class="ml-2 icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-plus"></i>
                </a>
                <a href='{{ route('export.master') }}' title='Export user from excel'
                    class="ml-2 icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-file-download"></i>
                </a>
                <a href='#' title='Import user from excel' data-toggle="modal" data-target="#excelUser"
                    class="ml-2 icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-file-upload"></i>
                </a>
                <a href='{{ route('pdf.master') }}' title='Print data user'
                    class="ml-2 icon icon-shape bg-purple text-white rounded-circle shadow">
                    <i class="fas fa-print"></i>
                </a>
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
                    <table class="table align-items-center table-flush" id="users-table">
                        <thead class='thead-light'>
                            <tr>
                                <th></th>
                                <th>Frist Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('page.modal.user')
    @include('page.modal.excel')
    @endsection
