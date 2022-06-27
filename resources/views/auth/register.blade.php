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
            <h2>{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="role" value="user">
                <fieldset>
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Full Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
                <fieldset>
                    <label for="email">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="name@mail.com">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
                <fieldset>
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                        value="{{ old('mobile') }}" placeholder="8888888888">
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
                <fieldset>
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="******">
                    @if (Route::has('password.request'))
                    <a class="reset" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
                <fieldset>
                    <label for="password">Password</label>
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="******">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </fieldset>
                <div class="remember-me">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    {{ __('Remember Me') }}
                </div>
                <button type="submit" class="btn primary-btn">
                    {{ __('Login') }}
                </button>
                <div class="or"><span>or</span></div>
                <p><a class="" href="{{ route('register') }}">
                        {{ __('Don’t have an account?') }}
                    </a></p>
                <a href="#" class="google-login">
                    <img src="{{ asset('site/images/g-icon.png') }}" alt="google">
                    Authorize with Google
                </a>
            </form>
        </div>
    </div>
</div>
@endsection