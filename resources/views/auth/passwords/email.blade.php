@extends('layouts.auth')

@section('content')
<div class="card bg-secondary shadow border-0">
    <div class="card-body px-lg-5 py-lg-3">
        <div class="text-center text-muted my-4">
            <h3>{{ __('Reset password') }}</h3>
        </div>
        <form role="form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative @error('email') is-invalid @enderror">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" id='email'
                        type="email" autofocus>
                </div>
                @error('email')
                <small class="text-danger font-weight-light" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <div class="text-center">
                <button type="Submit" class="btn btn-primary my-4">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        @if (Route::has('password.request'))
        <a class="text-light" href="{{ route('login') }}">
            <small>{{ __('Sign in') }}</small>
        </a>
        @endif
    </div>
    <div class="col-6 text-right">
        @if (Route::has('password.request'))
        <a class="text-light" href="{{ route('register') }}">
            <small>{{ __('Register new acount!') }}</small>
        </a>
        @endif
    </div>
</div>
@endsection
