<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Taxring - Online e-file Tax Return, ITR Filing,TDS Refund,Income tax return,GST Registration,Company
        Registration,Accounting etc..</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('korde/images/favicon.jpeg') }}">
    <link rel="apple-touch-icon" href="{{ asset('korde/images/icon.png') }}">

    <!-- Google font (font-family: 'Josefin Sans', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('korde/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('korde/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('korde/style.css') }}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{ asset('korde/css/custom.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('korde/js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>
    <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
 <![endif]-->

    <!-- Add your site or application content here -->
    <div class="fakeloader"></div>
    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        <header id="header" class="header sticky--header">
            @include('top-header')
        </header>
        <!-- //Header -->
        @include('header')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @include('client-navigation')
                </div>
            </div>
            <div class="clear-fix">&nbsp;</div>
        </div>
        <main class="page-content">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <div class="clear-fix">&nbsp;</div>
        <!-- //Page Conent -->
        @include('footer')
    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="{{ asset('korde/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('korde/js/popper.min.js') }}"></script>
    <script src="{{ asset('korde/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('korde/js/plugins.js') }}"></script>
    <script src="{{ asset('korde/js/active.js') }}"></script>
    <script src="{{ asset('korde/js/scripts.js') }}"></script>
    <script>
    let user_ajax_url = "<?php echo url('tr/user/'); ?>";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script src="https://kit.fontawesome.com/59e9e8345f.js" crossorigin="anonymous"></script>
    @yield('script')
</body>
<style>
body {
    overflow-x: hidden;
    font-size: 18px;
    line-height: 28px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-family: "Josefin Sans", sans-serif;
    color: #4B4B4B;
    font-weight: 300;
}

.banner-cls.img-thumbnail.img-fluid {
    background-image: url(https://taxring.com/korde/images/bg/2.jpg);
    background-size: contain;
    background-position: initial;
    background-repeat: no-repeat;
    background-attachment: inherit;
    position: relative;
    left: 0px;
    top: 0px;
    z-index: 999;
    opacity: 1;
}

.cr-breadcrumb-area {
    height: 250px;
}

.cr-breadcrumb {
    margin-top: 12%;
}

.banner__single__content h1 {
    width: 80%;
}

.banner__single__content h1 {
    font-size: 30px;
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
    .banner__single__content h1 {
        font-size: 25px;
        line-height: 48px;
        width: 60%;
    }

    a.cr-btn,
    button.cr-btn,
    .cr-btn {
        float: left;
        margin-left: 20%;
        -webkit-transition: border-color 0.5s ease-in-out 0s;
        -moz-transition: border-color 0.5s ease-in-out 0s;
        -ms-transition: border-color 0.5s ease-in-out 0s;
        -o-transition: border-color 0.5s ease-in-out 0s;
        transition: border-color 0.5s ease-in-out 0s;
    }
}

@media only screen and (max-width: 575px) {
    .banner__single__content h1 {
        font-size: 12px;
        line-height: 31px;
        width: 55%;
        text-align: justify;
    }

    .cr-breadcrumb h1 {
        font-size: 30px;
    }

    .banner__single__content {
        padding: initial;
        color: #fff;
        text-transform: uppercase;
    }

    .banner-cls.img-thumbnail {
        background-image: url(https://taxring.com/korde/images/bg/2.jpg);
        background-size: contain;
        background-position: initial;
        background-repeat: no-repeat !important;
        background-attachment: inherit;
        width: 367px;
        position: relative;
        left: 0px;
        top: 0px;
        z-index: 999;
        opacity: 1;
    }
}
</style>

</html>