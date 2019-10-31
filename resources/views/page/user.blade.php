@extends('layouts.app')

@section('content')
<!-- Header -->

<div class="header pb-8 pt-5 pt-md-8"
    style=" background-image: url({{ asset('images/bg-profile.jpg') }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href='#' title='Add new user' class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-plus"></i>
                </a>
                <a href='#' title='Export user from excel'
                    class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href='#' title='Import user from excel'
                    class="icon icon-shape bg-green text-white rounded-circle shadow">
                    <i class="fas fa-arrow-down"></i>
                </a>
                <a href='#' title='Print data user' class="icon icon-shape bg-purple text-white rounded-circle shadow">
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
                <h3 class="card-header bg-white border-0">
                    {{ __('Data user') }}
                </h3>

                <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
