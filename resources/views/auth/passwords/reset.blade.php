@extends('layouts.auth')

@section('content')
<div class="card bg-secondary shadow border-0">
    <div class="card-body px-lg-5 py-lg-3">
        <div class="text-center text-muted my-4">
            <h3>{{ __('Reset password') }}</h3>
        </div>
        <form role="form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative @error('email') is-invalid @enderror">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" id='email'
                        type="email">
                </div>
                @error('email')
                <small class="text-danger font-weight-light" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input placeholder="Password" id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password">
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
                    {{ __('Reset password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
