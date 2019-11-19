@extends('layouts.app')

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
    style="min-height: 600px; background-image: url({{ asset('images/bg-profile.jpg') }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-10">
                <h1 class="display-2 text-white">Hello {{ $user->first_name}}</h1>
                <p class="text-white mt-0 mb-5">This is your profile page. Don't forget to update your personal data</p>
                {{-- <a href="#!" class="btn btn-info">Edit profile</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--9">
    <div class="row">
        <div class="col-xl-7 mx-auto order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img style='max-width: 148px;' src="{{ auth()->user()->getAvatar() }}"
                                    class="rounded-circle bg-white img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-8 pb-0">
                    <div class="d-flex justify-content-center">
                        <button data-toggle="modal" data-target="#userModal" class="btn btn-sm btn-info">Update
                            Acount</button>
                        {{-- <button data-toggle="modal" data-target="#profileModal"
                            class="btn btn-sm btn-default float-right">Update Profile</button> --}}
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-1">

                    <div class="text-center">
                        <h3>
                            {{ $user->first_name .' '. $user->last_name }}
                        </h3>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ $profile->address }}, {{ $profile->province }}
                        </div>
                        <div class="h5">
                            <i class="fas fa-phone mr-2"></i>{{ $profile->contact }}
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>{{ $user->email }}
                        </div>
                        <hr class="my-4" />
                        <p>— {{ $profile->about }} —</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-secondary">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="Home Address"
                                                value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="input-city"
                                                class="form-control form-control-alternative" placeholder="City"
                                                value="New York">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="input-country"
                                                class="form-control form-control-alternative" placeholder="Country"
                                                value="United States">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal
                                                code</label>
                                            <input type="number" id="input-postal-code"
                                                class="form-control form-control-alternative" placeholder="Postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea rows="4" class="form-control form-control-alternative"
                                        placeholder="A few words about you ...">{{ $profile->about }}</textarea>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-sm" id='userModal' tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form action="{{ route('profile.acount', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title" id="profileModalLabel">Update Acount</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body bg-secondary">

                            <div class="card-profile-image mt-5">
                                <a href="#">
                                    <img style='max-width: 148px;' src="{{ auth()->user()->getAvatar() }}"
                                        class="rounded-circle">
                                </a>
                            </div>
                            <div class="input-group pt-9" style='font-size: 14px;'>
                                <div class="custom-file argon-form-shadow">
                                    <input type="file" name='avatar'
                                        class="custom-file-input @error('avatar') is-invalid @enderror" id="avatar">
                                    <label class="custom-file-label border-0" for="avatar">Choose file</label>
                                    @error('avatar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr class="my-2" />
                                    <h6 class="heading-small text-muted mb-4">Change Email</h6>
                                    <div class="form-group">
                                        <label class="form-control-label " for="input-email">Email
                                            address</label>
                                        <input type="email" name='email' id="input-email"
                                            class="form-control form-control-alternative @error('email') is-invalid @enderror"
                                            placeholder="New Email" value='{{ $user->email }}'>
                                        @error('email')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--
                                <hr class="my-2" />
                                <h6 class="heading-small text-muted mb-4">Change Password</h6> --}}
                            <hr class="my-2" />
                            <h6 class="heading-small text-muted mb-4">Change Password</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Password</label>
                                        <input type="password" id="psw" name='psw'
                                            class="form-control form-control-alternative @error('psw') is-invalid @enderror"
                                            placeholder="New Password">
                                        @error('psw')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Confirm Password</label>
                                        <input type="password" id="re_psw" name='re_psw'
                                            class="form-control form-control-alternative @error('re_psw') is-invalid @enderror"
                                            placeholder="Confirm New Password">
                                        @error('re_psw')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
