<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('dashboard/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Dashboard
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />

    <link href="{{ asset('dashboard/assets/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- <link href="{{ asset('dashboard/assets/datatable/rowReorder.dataTables.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('dashboard/assets/datatable/responsive.dataTables.min.css') }}" rel="stylesheet" />


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('dashboard/assets/demo/demo.css') }}" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .header__bottom.bg--white {
            margin-top: 15px;
        }

        .d-lg-block {
            display: block !important;
            height: 50px;
        }

    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
        integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg=="
        crossorigin="anonymous" />
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    @yield('extra-css')

</head>

<body class="">
    @yield('content')
    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chart JS -->
    <script src="{{ asset('dashboard//assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('dashboard/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/assets/js/paper-dashboard.min.js?v=2.0.0') }}"></script>

    <script src="{{ asset('dashboard/assets/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <!-- <script src="{{ asset('dashboard/assets/datatable/dataTables.rowReorder.min.js') }}"></script> -->
    <script src="{{ asset('dashboard/assets/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"
        integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg=="
        crossorigin="anonymous"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('dashboard/assets/demo/demo.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    @yield('script')
    <!-- Modal -->
    <div class="modal fade " id="dynamicModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
    </div>

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });

        $(document).ready(function() {
            $('#dt-mant-table').DataTable({
                //"dom": 'lfrtip'
                "dom": 'frti',
                //responsive: true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script>
        "use strict";

        var Dashboard = function() {
            var global = {
                tooltipOptions: {
                    placement: "right"
                },
                menuClass: ".c-menu"
            };

            var menuChangeActive = function menuChangeActive(el) {
                var hasSubmenu = $(el).hasClass("has-submenu");
                $(global.menuClass + " .is-active").removeClass("is-active");
                $(el).addClass("is-active");

                // if (hasSubmenu) {
                // 	$(el).find("ul").slideDown();
                // }
            };

            var sidebarChangeWidth = function sidebarChangeWidth() {
                var $menuItemsTitle = $("li .menu-item__title");

                $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
                $(".hamburger-toggle").toggleClass("is-opened");

                if ($("body").hasClass("sidebar-is-expanded")) {
                    $('[data-toggle="tooltip"]').tooltip("destroy");
                } else {
                    $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
                }
            };

            return {
                init: function init() {
                    $(".js-hamburger").on("click", sidebarChangeWidth);

                    $(".js-menu li").on("click", function(e) {
                        menuChangeActive(e.currentTarget);
                    });

                    $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
                }
            };
        }();

        Dashboard.init();
        //# sourceURL=pen.js
    </script>
    <style>
        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
        }

    </style>

    <style>
        input.fprice {
            border: none;
            margin-left: 5%;
            text-align: right;
            /* vertical-align: middle; */
            /* width: 20%; */
        }

        p.pl-check {
            width: 50%;
            float: left;
            clear: both;
        }

    </style>
    @yield('extra-script')
</body>

</html>
