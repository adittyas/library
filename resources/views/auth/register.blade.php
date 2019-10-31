@extends('layouts.auth')

@section('content')
<div class="card bg-secondary shadow border-0">

    <div class="card-body px-lg-5 py-lg-3">
        <div class="text-center text-muted my-4">
            <h3>{{ __('Register new account') }}</h3>
        </div>
        <form role="form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative @error('email') is-invalid @enderror">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" name="name" placeholder="Full name" value="{{ old('name') }}" id='name'
                        type="text" required>
                </div>
                @error('name')
                <small class="text-danger font-weight-light" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative @error('email') is-invalid @enderror">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" id='email'
                        type="email" required>
                </div>
                @error('email')
                <small class="text-danger font-weight-light" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input placeholder="Password" id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required>
                </div>
                @error('password')
                <small class="text-danger font-weight-light" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm password">
                </div>
                @error('password')
                <small class="text-danger font-weight-light" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <div class="text-center">
                <button type="Submit" class="btn btn-primary my-4">
                    {{ __('Create new account') }}
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        @if (Route::has('password.request'))
        <a class="text-light" href="{{ route('password.request') }}">
            <small>{{ __('Forgot Your Password?') }}</small>
        </a>
        @endif
    </div>
    <div class="col-6 text-right">
        @if (Route::has('password.request'))
        <a class="text-light" href="{{ route('login') }}">
            <small>{{ __('Already have account!') }}</small>
        </a>
        @endif
    </div>
</div>
@endsection
