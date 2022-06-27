@extends('site-layout')
@section('content')
<div class="login-page">
    <div class="left">
        <img class="logo" src="{{ asset('site/images/logo.png') }}" alt="logo">
        <div class="content">
            <h1>Designed for Individuals</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <div class="right">
        <div class="form-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <label for="email">Email address</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="name@mail.com">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
                <fieldset>
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                        placeholder="******">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <a href="{{ route('password.request') }}" class="reset">Reset Password</a>
                </fieldset>
                <div class="remember-me">
                    <input type="checkbox" {{ old('remember') ? 'checked' : '' }} />
                    {{ __('Remember Password') }}
                </div>
                <button type="submit" class="primary-btn btn"> {{ __('Login') }}</button>
                <div class="or"><span>or</span></div>
                <p>Don’t have an account?</p>
                <a href="#" class="google-login">
                    <img src="{{ asset('site/images/g-icon.png')}}" alt="google">
                    Authorize with Google
                </a>
            </form>
        </div>
    </div>
</div>
@endsection