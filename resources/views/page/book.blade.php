@extends('layouts.app')

@section('content')
<!-- Header -->

<div class="header pb-8 pt-5 pt-md-8"
    style="background-image: url({{ asset('images/icons/book-bg.jpg') }}); background-size: cover; background-position: center top;"
    id='bg_book'>
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="text-white" id='titleBook'>
                    {{ __('Data Book') }}
                </h1>
            </div>
            <div class="col-lg-6">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a id='data-book-trigger' class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                data-toggle="tab" href="#data-book" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"><i class="fas fa-book mr-2"></i>Book</a>
                        </li>
                        <li id='data-book3-trigger' class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                href="#data-book3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                                    class="fas fa-industry mr-2"></i>Publisher</a>
                        </li>
                    </ul>
                </div>
                {{-- <a id='new-book' href='#' title='Add new book'
                    class="ml-2 icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-heading"></i>
                </a>
                <a id='new-book-data' href='#' title='Add new book'
                    class="ml-2 icon icon-shape bg-green text-white rounded-circle shadow">
                    <i class="fas fa-calculator"></i>
                </a>
                <a href='{{ route('export.book') }}' title='Export book from excel'
                class="ml-2 icon icon-shape bg-yellow text-white rounded-circle shadow">
                <i class="fas fa-file-download"></i>
                </a>
                <a href='#' title='Import book from excel' data-toggle="modal" data-target="#excelbook"
                    class="ml-2 icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-file-upload"></i>
                </a>
                <a href='{{ route('pdf.book') }}' title='Print data book'
                    class="ml-2 icon icon-shape bg-purple text-white rounded-circle shadow">
                    <i class="fas fa-print"></i>
                </a> --}}
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body px-0 table-responsive">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane table-panel fade show active" id="data-book" role="tabpanel"
                            aria-labelledby="data-book-tab">
                            <table class="table align-items-center table-flush" id="books-table">
                                <thead class='thead-light'>
                                    <tr>
                                        <th></th>
                                        <th>Book Title</th>
                                        <th>Category</th>
                                        <th>Available</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-panel fade" id="data-book3" role="tabpanel"
                            aria-labelledby="data-book3-tab">
                            <table class="table align-items-center table-flush" id="publishers-table">
                                <thead class='thead-light'>
                                    <tr>
                                        <th></th>
                                        <th>Publisher Name</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card shadow">
                <div class="card-body px-0">
                    <div class="tab-content table-responsive" id="myTabContent">
                        <div class="tab-pane fade show active" id="data-book" role="tabpanel"
                            aria-labelledby="data-book-tab">
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
                        <div class="tab-pane fade show active" id="data-book2" role="tabpanel"
                            aria-labelledby="data-book2-tab">
                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua,
                                retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                                Reprehenderit butcher retro
                                keffiyeh dreamcatcher synth.</p>
                            <p class="description">Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua,
                                retro synth master cleanse.</p>
                        </div>
                        <div class="tab-pane fade show active" id="data-book3" role="tabpanel"
                            aria-labelledby="data-book3-tab">
                            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quidem
                                error magnam ipsam eum, pariatur, ullam repudiandae, eos voluptate quod corporis unde
                                quos neque amet itaque. Ipsa possimus ipsam ullam.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Book Modal -->
    @include('page.modal.book')

    <!-- Book Modal -->
    @include('page.modal.booking')

    <!-- Publisher Modal -->
    @include('page.modal.publisher')

    <!-- BookIn Modal -->
    @include('page.modal.bookIn')

    {{-- Excel modal --}}
    @include('page.modal.excel')

    <!-- Modal plus minus-->
    {{-- <div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stockModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-secondary">
                        <div class="form-group">
                            <label class="form-control-label" for="role">Total</label>
                            <div class="checkValidate">
                                <input type="text" class="form-control form-control-alternative" id="qty" name='qty'
                                    placeholder="Total book">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="role">Reason</label>
                            <div class="checkValidate">
                                <select id='reason' name='reason' class="form-control" title='Please select something!'>
                                    <option value=''>Select...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="role">Other Reason</label>
                            <div class="checkValidate">
                                <input type="text" class="form-control form-control-alternative" id="otherReason"
                                    name='otherReason' placeholder="Reason">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    @endsection
