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
                    {{ __('Master Data Book') }}
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
                    <table class="table align-items-center table-flush" id="books-table">
                        <thead class='thead-light'>
                            <tr>
                                <th></th>
                                <th>Book Title</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id='userForm' action="{{ route('user.store') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" id='id'>
                    <div class="modal-header">
                        <h2 class="modal-title" id="userModalLabel"></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body bg-secondary">

                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="px-lg-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="first-name">First name</label>
                                        <input type="text" name='firstName' id="first-name"
                                            class="form-control form-control-alternative" placeholder="First name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="last-name">Last name</label>
                                        <input type="text" name='lastName' id="last-name"
                                            class="form-control form-control-alternative" placeholder="Last name"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="id-employee">ID Employee</label>
                                        <input type="text" maxlength="4" name='idEmployee' id="id-employee"
                                            class="form-control form-control-alternative" placeholder="ID Employee"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label" for="role">Departement</label>
                                            <select id='role' name='role' class="form-control">
                                                <option value='ignore' selected disabled hidden>Select...</option>
                                                <option value='admin'>Admin</option>
                                                <option value='master'>Master</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email address</label>
                                <input type="email" name='email' id="email"
                                    class="form-control form-control-alternative" placeholder="abc@example.com"
                                    required>
                            </div>
                        </div>
                        <hr class="my-3" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact Information</h6>
                        <div class="px-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="address">Address</label>
                                <input type="text" id="address" name='address'
                                    class="form-control form-control-alternative" placeholder="Address now" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="province">The Provinces</label>
                                        <select id='province' name='province' class="form-control">
                                            <option value='ignore' selected disabled hidden>Select...</option>
                                            {{-- province --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="districts">Districts</label>
                                        <select id='districts' name='district' class="form-control">
                                            <option value='ignore' selected disabled hidden>Select...</option>
                                            {{-- province --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="sub-districts">Sub Districts</label>
                                        <select id='sub-districts' name='subDistrict' class="form-control">
                                            <option value='ignore' selected disabled hidden>Select...</option>
                                            {{-- province --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="urban-village">Urban Village</label>
                                        <select id='urban-village' name='urbanVillage' class="form-control">
                                            <option value='ignore' selected disabled hidden>Select...</option>
                                            {{-- province --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="postal-code">Postal Code</label>
                                        <input maxlength="5" name='postalCode' type="text" id="postal-code"
                                            class="form-control form-control-alternative" placeholder="00000" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="contact">Contact</label>
                                <input maxlength="13" type="text" id="contact" name='contact'
                                    class="form-control form-control-alternative" placeholder="Contact" required>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id='submit' class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="excelUser" tabindex="-1" role="dialog" aria-labelledby="excelUserTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Import Data Excel</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                    <div class="container">
                        <form action="{{ route('import.master') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">search file excel...</label>
                            </div> --}}
                            <div class="input-group">
                                <div class="input-group-prepend ">
                                    <button type='submit' class="btn btn-primary" type="button">Import</button>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name='excel' class="custom-file-input bg-primary" id="excel"
                                        accept=".xlsx,.xlsm,.xltx,.xltm">
                                    <label class="custom-file-label" for="excel">Choose file</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endsection
