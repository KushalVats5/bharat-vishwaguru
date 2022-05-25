@extends('site-layout')

@section('content')
<div class="login-page">
    <div class="site-login-signup site-signup">
        <div class="banner-login">
            <div class="top-relement"></div>
        </div>
        <div class="container clearfix">
            <div class="row custom-row">
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 clearfix">
                    <div class="row calculator-wrapper">
                        <div class="col-md-6 col-sm-5 col-xs-12 left">
                            <h2>Register</h2>
                            <p></p>
                            <p>Looking for Online Tax filing, GST & Accounting Help?? <br class="hidde-sm hidden-xs">
                                Register Now to file your tax return. It's Easiest, Fastest, Convenient & Secure.
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
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            {{-- <label for="name" class="col-md-12 col-form-label ">{{ __('Full Name') }}</label>
                                            --}}

                                            <div class="col-md-12">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" placeholder="Full Name" required
                                                    autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{-- <label for="email" class="col-md-12 col-form-label ">{{ __('E-Mail Address') }}</label>
                                            --}}

                                            <div class="col-md-12">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" placeholder="Email Id"
                                                    required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{-- <label for="mobile" class="col-md-12 col-form-label ">{{ __('Mobile') }}</label>
                                            --}}
                                            <div class="col-md-12">
                                                <input type="tel"
                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                    name="mobile" value="{{old('mobile')}}"
                                                    placeholder="10 digit Mobile number" minlength=10 maxlength=10
                                                    pattern="\d*" title="10 digit Mobile number" required>
                                                @error('mobile')
                                                <label id="mobile-error" class="error"
                                                    for="mobile">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{-- <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>
                                            --}}

                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password" required
                                                    autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{-- <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirm Password') }}</label>
                                            --}}

                                            <div class="col-md-12">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" placeholder="Confirm Password" required
                                                    autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <input type="hidden" name="role" value="user">
                                            <!-- <div class="col-md-12">
                                <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">--Select Role --</option>
                                    <option value="user">User</option>
                                    <option value="freelancer">Freelancer</option>
                                </select>
                                @error('role')
                                    <label id="role-error" class="error" for="role" class="form-control @error('role') is-invalid @enderror" style="color:red;">{{ $message }}</label>
                                @enderror
                            </div> -->
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button><br>


                                                <a class="btn btn-link" href="{{ route('login') }}">
                                                    {{ __('Login') }}
                                                </a>
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