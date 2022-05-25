<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<!-- Header Bottom Area -->
<div class="header__bottom bg--white">
    <div class="container d-none d-lg-block">
        <div class="header__bottom__inner">
            <div class="header__logo">
                <a href="{{ route('root') }}">
                    <img src="{{ asset('storage/default/taxring.jpg') }}" alt="header logo" width="180px" height="60px">
                </a>
            </div>

            <!-- Main Navigation -->
            <nav id="main-navigation" class="header__menu main-navigation">
                <ul>
                    <li class="">
                        <a href=" {{ route('root') }}">Home</a>
                    </li>
                    <li class="">
                        <a href=" {{ route('dynamicService', 'salary-tax-return') }}">Income Tax</a>
                    </li>
                    <li class="">
                        <a href=" {{ route('dynamicService', 'bussiness-tax-return') }}">GST</a>
                    </li>
                    <li class="">
                        <a href=" {{ route('dynamicService', 'accounting') }}">Accounting</a>
                    </li>
                    <li class="">
                        <a href=" {{ route('root') }}">Tax Saving</a>
                    </li>
                    <li class="cr-dropdown">
                        <a href="#">Registraitions</a>
                        <ul class="cr-dropdown-menu">
                            <li class="nav-item">
                                <a class=""
                                    href="{{ route('dynamicService', 'importexport-code-registration') }}">IMPORT/EXPORT
                                    CODE REGISTRATION</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{ route('dynamicService', 'pfes-registration') }}">PF/ESIC
                                    REGISTRATION</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{ route('dynamicService', 'file-tds-return') }}">TRUST / NGO
                                    REGISTRATION</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{ route('dynamicService', 'pen-card') }}">PAN CARD
                                    (NEW/CORRECTION)</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{ route('dynamicService', 'msme-registration') }}">MSME
                                    REGISTRATION</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="{{ route('dynamicService', 'company-registration-fee') }}">COMPANY /
                                    FIRM REGISTRATION</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href=" {{ route('freelancer') }}">Freelancer</a>
                    </li>
                </ul>
            </nav>
            <!--// Main Navigation -->

        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="container d-block d-lg-none">
        <div class="mobile-menu clearfix d-md-block d-lg-none">
            <a href="{{ route('root') }}">
                <img src="{{ asset('storage/default/taxring.jpg') }}" alt="header logo" width="180px" height="60px">
            </a>
        </div>
    </div>
    <!-- //Mobile Menu -->




</div>
<!--// Header Bottom Area -->
<header class="header large-none">

    <div class="container clearfix">

        <a class="logo float-left" href="#"><img src="{{ asset('storage/default/taxring.jpg') }}" alt="header logo"
                width="180px" height="60px"></a>
        <button type="button" class="nav-button hidden-block">
            <span class="icon-bar1">
                <!-- menu strip 1 -->
            </span>
            <span class="icon-bar2">
                <!-- menu strip 2 -->
            </span>
            <span class="icon-bar3">
                <!-- menu strip 3 -->
            </span>
        </button>
        <nav class="navbar float-right site-main-navbar">

            <ul class="nav">
                <li class="">
                    <a href=" {{ route('dynamicService', 'salary-tax-return') }}">Income Tax</a>
                </li>
                <li class="">
                    <a href=" {{ route('dynamicService', 'bussiness-tax-return') }}">GST</a>
                </li>
                <li class="">
                    <a href=" {{ route('dynamicService', 'accounting') }}">Accounting</a>
                </li>
                <li class="">
                    <a href=" {{ route('root') }}">Tax Saving</a>
                </li>
                <li class="cr-dropdown">
                    <a href="#">Registraitions</a>
                    <ul class="cr-dropdown-menu" style="display: none;">
                        <li class="nav-item">
                            <a class=""
                                href="{{ route('dynamicService', 'importexport-code-registration') }}">IMPORT/EXPORT
                                CODE REGISTRATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('dynamicService', 'pfes-registration') }}">PF/ESIC
                                REGISTRATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('dynamicService', 'file-tds-return') }}">TRUST / NGO
                                REGISTRATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('dynamicService', 'pen-card') }}">PAN CARD (NEW/CORRECTION)</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('dynamicService', 'msme-registration') }}">MSME REGISTRATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('dynamicService', 'company-registration-fee') }}">COMPANY / FIRM
                                REGISTRATION</a>
                        </li>
                    </ul>
                </li>
                {{-- <li><a href="#">Make an appointment</a></li> --}}
                <li class="cr-dropdown">
                    <a href="#">My Account</a>
                    <ul class="cr-dropdown-menu" style="display: none;">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="" href=" {{ url('/home') }}">Account</a>\
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="" href=" {{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="" href=" {{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>

    </div>

</header>
<!--Header Section End-->


<script>
var windowWindth;
var clearTimeout;
(function($) {
    windowWindth = $(window).width();


    $('.nav-button').on('click', function(event) {
        if (windowWindth < 768) {
            event.stopPropagation();
            $("body").toggleClass('slide-nav');
        }
    });

    if ($("body.nav-toggle").length > 0) {
        $('.nav-button').on('click', function() {
            if (windowWindth < 768) {
                $(this).parents('.navbar').find('.nav').slideToggle();
            }
        });
    }
    $(".nav").on("click", function(event) {
        event.stopPropagation();
    });

    $(".nav li").off("click", ".nav li").on("click", function(event) {
        if (windowWindth < 768) {
            event.stopPropagation();
            $(this).siblings().removeClass("active");
            $(this).siblings().find("active").removeClass("active");
            $(this).siblings().find("ul").slideUp();
            $(this).toggleClass("active");
            $(this).children("ul").slideToggle();
        }
    })

    $("a").on("click", function(event) {
        if ($(this).attr("href") == "#")
            event.preventDefault();
    })

    $(window).on('click', function() {
        $("body").removeClass('slide-nav');
    });


})(jQuery);



$(window).resize(function() {
    clearInterval(clearTimeout);
    clearTimeout = setTimeout(function() {

        windowWindth = $(window).width();
        if (windowWindth > 768) {
            $('body').find('.nav li').find('ul').removeAttr('style');
        }
        console.log(windowWindth);
    }, 200)
})
</script>