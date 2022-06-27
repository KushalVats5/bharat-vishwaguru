<a href="{{route('root')}}" class="logo">
    <img src="{{ asset('site/images/black-logo.png') }}" alt="logo">
</a>
<div class="search-box">
    <form method="GET" action="{{ route('articles.search') }}">
        {{-- @csrf --}}
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" name="s" value="{{request()->s}}" class="form-control">
        <button class="search-btn">Search</button>
    </form>
</div>
<div class="right">
    <div class="notification">
        <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10.5 24C9.86996 23.997 9.26644 23.7541 8.81982 23.3237C8.3732 22.8934 8.11936 22.3101 8.11312 21.7H12.8631C12.8656 22.0075 12.8051 22.3124 12.685 22.597C12.5314 22.9383 12.2963 23.2393 11.999 23.4752C11.7017 23.7111 11.3507 23.8753 10.975 23.954H10.9192C10.7812 23.9818 10.6409 23.9972 10.5 24ZM20 20.55H1V18.25L3.375 17.1V10.775C3.31244 9.15249 3.6908 7.54249 4.47225 6.106C4.85681 5.44736 5.3812 4.87517 6.01083 4.42717C6.64047 3.97917 7.36104 3.66555 8.125 3.507V1H12.875V3.507C15.9376 4.2131 17.625 6.7937 17.625 10.775V17.1L20 18.25V20.55Z"
                stroke="#CACEE5" stroke-width="2">
        </svg>
        <span class="counter">1</span>
        <div class="dropdown">
            <h3>Notification <a href="#">View All</a></h3>
            <ul>
                <li>
                    <img src="{{ asset('site/images/profile.png') }}" alt="profile">
                    <div class="profile-view">
                        <h4>Adam Smith</h4>
                        <p>Likes Your comment</p>
                    </div>
                    <span>2 Days ago</span>
                </li>
                <li>
                    <img src="{{ asset('site/images/profile.png') }}" alt="profile">
                    <div class="profile-view">
                        <h4>Adam Smith</h4>
                        <p>Likes Your comment</p>
                    </div>
                    <span>2 Days ago</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="profile-image">
        <img src="{{ asset('site/images/profile.png') }}" alt="profile">
        <div class="profile-name">
            <span>{{ Auth::check() ? Auth::user()->name : 'My Acoount' }}</span>
            <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L8.5 8.5L16 1" stroke="#FE5557" stroke-width="2" />
            </svg>
            <div class="dropdown">
                <ul>
                    <li><a href="#">Account & Privacy</a></li>
                    <!-- <li><a href="#">Logout</a></li> -->
                    @if (Auth::check())
                        <li>
                            <a class="nav-link btn-magnify" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                <i class="nc-icon nc-user-run"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        {{-- <li><a href="{{ route('user.profile') }}">Logout</a></li> --}}
                    @else
                    <li><a href="{{ route('login') }}">{{__('Login')}}</a></li>
                    <li><a href="{{ route('register') }}">{{__('Register')}}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
