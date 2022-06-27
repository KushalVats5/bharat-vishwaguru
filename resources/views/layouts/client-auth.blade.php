<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <!-- Stylesheets -->
    {{-- <link rel="stylesheet" href="{{ asset('korde/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('korde/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('korde/style.css') }}"> --}}

    <!-- Cusom css -->
    {{-- <link rel="stylesheet" href="{{ asset('korde/css/custom.css') }}"> --}}

    <title>Bharat Vishwaguru</title>
</head>


<body class="{{ \Cache::get('theme') }}">

    <!-- Main wrapper -->

    <main class="main-container">
        <header>
            @include('header')
        </header>

        @include('sidebar')
        @yield('banner')
        {{-- <div class="container user-dashboard-nav" style="margin-top: 8%;">
            <div class="row">
                <div class="col-sm-12">
                    @include('client-navigation')
                </div>
            </div>
            <div class="clear-fix">&nbsp;</div>
        </div> --}}
        @yield('content')
    </main>
    <!-- //Page Conent -->
    @include('footer')
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('korde/js/scripts.js') }}"></script>
    <script>
        let user_ajax_url = "<?php echo url('tr/user/'); ?>";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeTheme(theme) {
            $.ajax({
                type: 'POST',
                url: "{{ route('theme-change') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    theme: theme
                },
                success: function(response) {
                    // console.log(response.responseText);
                    // alert(response.message);
                    // $('.section-search-'+id).remove();
                },
                error: function(jqXHR, exception) {
                    // console.log(jqXHR);
                    // console.log(exception);
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 401) {
                        msg = 'Unauthorized: ' + jqXHR.responseJSON.message;
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500]. ' + jqXHR.responseJSON.message;
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error: ' + jqXHR.responseJSON.message;
                    }
                    // alert(msg);
                }
            });
        }
        $(document).ready(function() {
            $('.light-theme-active').click(function() {
                $('.theme-change li a').removeClass('active');
                changeTheme('light-theme');
                $('body').addClass('light-theme');
                $(this).addClass('active');
            })
            $('.dark-theme-active').click(function() {
                changeTheme('dark-theme');
                $('.theme-change li a').removeClass('active');
                $('body').removeClass('light-theme');
                $(this).addClass('active');
            })
        });
          // Save Like Or Dislike
    $(document).on('click', '.saveLikeDislike', function (e) {
        e.preventDefault();
        var _post = $(this).data('post');
        var _type = $(this).data('type');
        var vm = $(this).find('.likeDislike');
        // Run Ajax
        $.ajax({
            url: "{{ url('save-likedislike') }}",
            type: "post",
            dataType: 'json',
            data: {
                post: _post,
                type: _type,
                _token: "{{ csrf_token() }}"
            },
            beforeSend: function () {
                vm.addClass('disabled');
            },
            success: function (res) {
                if (res.success == true) {
                    vm.removeClass('disabled').addClass('active');
                    vm.removeAttr('id');
                    var _prevCount = $("." + _type + "-count").text();
                    _prevCount++;
                    $("." + _type + "-count").text(_prevCount);
                    alert(res.message);
                }
            },
            error: function (jqXHR, exception) {
                // console.log(jqXHR);
                // console.log(exception);
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 401) {
                    msg = 'Unauthorized: ' + jqXHR.responseJSON.message;
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500]. ' + jqXHR.responseJSON.message;
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error: ' + jqXHR.responseJSON.message;
                }
                alert(msg);
            }
        });
    });
    </script>
    @yield('style')
    @yield('script')
</body>

</html>
