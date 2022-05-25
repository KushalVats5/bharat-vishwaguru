@extends('site-layout')

@section('content')



<div class="login-page">
    <div class="site-login-signup">
        <div class="banner-login">
            <div class="top-relement"></div>
        </div>
        <div class="container clearfix">
            <div class="row custom-row">
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 clearfix">
                    <div class="row calculator-wrapper">
                        <div class="col-md-6 col-sm-5 col-xs-12 left">
                            <h2>Login</h2>
                            <p></p>
                            <p>Looking for Online Tax filing, GST & Accounting Help?? <br class="hidde-sm hidden-xs">
                                Login Now to file your tax return. It's Easiest, Fastest, Convenient & Secure.
                            </p>
                            <div class="contact-detail clearfix" id="contact-detail">
                                <ul>
                                    <li>
                                        <figure><img src="{{asset('korde/images/bg/contact.jpeg')}}" alt=""></figure>
                                        <span><strong> +91 9990-07-08-84</strong></span>
                                    </li>
                                    <li>
                                        <figure><img src="{{asset('korde/images/bg/mail.jpeg')}}" alt=""></figure>
                                        <span><a href="mailto:support@taxring.com"> support@taxring.com</a></span>
                                    </li>
                                </ul>
                            </div>
                            <br class="hidden-xs"><br class="hidden-xs">
                            {{-- <img src="https://tax2win.in/assets-new/img/signup-element.png" alt="" class="laptop_elmt hidden-xs">  --}}
                        </div>
                        <div class="col-md-6 col-sm-7 col-xs-12 right">
                            <div class="card">
                                <!--
                <a href="{{ route('root') }}">
                    <h4>{{ __('Taxring') }}</h4>
                </a>
                <hr>
                <div class="card-header">
                    <h4 class="" style="text-align:center;">{{ __('Login') }}</h4>
                </div>-->
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group row">
                                            {{-- <label for="email"
                            class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label> --}}
                                            <div class="col-md-12">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus placeholder="Username">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            {{-- <label for="password"
                            class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label> --}}
                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 justify-content-center">
                                                <div class="form-check">
                                                    <input class="form-control" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>

                                                <div class="register-wraper">
                                                    @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    @endif


                                                    <a class="btn btn-link" href="{{ route('register') }}">
                                                        {{ __('Registration') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection