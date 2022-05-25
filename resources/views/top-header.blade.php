 <!-- Header Top Area -->
 <div class="header__top bg--blue">
     <div class="container">
         <div class="header__top__inner">
             <ul class="header__top__info">
                 <li>
                     <a href="#">
                         <i class="flaticon-old-typical-phone"></i> 9990070884</a>
                 </li>
                 <li>
                     <a href="#">
                         <i class="flaticon-black-back-closed-envelope-shape"></i> support@taxring.com</a>
                 </li>
             </ul>
             <div class="header__top__button">
                 <a class="cr-btn cr-btn--lg" href="{{ route('contactus') }}">
                     <span>Make an appointment</span>
                 </a>
             </div>
             <nav id="main-navigation" class="header__menu main-navigation">
                 <ul>
                     <li class="cr-dropdown">
                         <a href="#">My Account</a>
                         <ul class="cr-dropdown-menu">
                             @if (Route::has('login'))
                             @auth
                             <li class="nav-item">
                                 <a class="nav-link cr-btn cr-btn--lg"
                                     href="{{ url('/tr/user/dashboard') }}">{{ auth()->user()->name }}</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link btn-magnify" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                     <i class="nc-icon nc-user-run"></i>
                                     <p>
                                         Logout
                                     </p>
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                     style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                             </li>
                             @else
                             <li class="nav-item">
                                 <a class="nav-link cr-btn cr-btn--lg" href="{{ route('login') }}">Login</a>
                             </li>

                             @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="nav-link cr-btn cr-btn--lg" href="{{ route('register') }}">Register</a>
                             </li>
                             @endif
                             @endauth
                             @endif
                         </ul>
                     </li>
                 </ul>
             </nav>
         </div>
     </div>
 </div>
 <!--// Header Top Area -->