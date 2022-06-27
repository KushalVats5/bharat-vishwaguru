<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <title>Bharat Vishwaguru || login</title>
</head>

<body>
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
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@mail.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </fieldset>
                    <fieldset>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="******">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <a href="{{ route('password.request') }}" class="reset">Reset Password</a>
                    </fieldset>
                    <div class="remember-me">
                        <input type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
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
</body>

</html>