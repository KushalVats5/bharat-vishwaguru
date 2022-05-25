<div class="sidebar" data-color="white" data-active-color="danger">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ Storage::url('uploads/profile-pic/'.Auth::user()->id.'/'.Auth::user()->avatar) }}"
                    alt="{{ Auth::user()->name }}" />
            </div>
        </a>
        <a href="#" class="simple-text logo-normal">
            {{ Auth::user()->name }}<br>
            {{ Auth::user()->email }}
            <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li {{ Route::is('home') ? 'class=active' : '' }}>
                <a href="{{ route('home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li {{ Route::is('profile.index') ? 'class=active' : '' }}>
                <a href="{{ route('profile.index') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <p>User Profile</p>
                </a>
            </li>

            @role('super-admin|admin')
            <li {{ Route::is('users.index') ? 'class=active' : '' }}>
                <a href="{{ route('user.freelancers') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Freelancers</p>
                </a>
            </li>
            <li {{ Route::is('users.index') ? 'class=active' : '' }}>
                <a href="{{ route('users.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Customers</p>
                </a>
            </li>
            <li {{ Route::is('pages.index') ? 'class=active' : '' }}>
                <a href="{{ route('pages.index') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>Pages</p>
                </a>
            </li>
            <li {{ Route::is('services.index') ? 'class=active' : '' }}>
                <a href="{{ route('services.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Services</p>
                </a>
            </li>

            <li {{ Route::is('testimonial.index') ? 'class=active' : '' }}>
                <a href="{{ route('testimonial.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Testimonials</p>
                </a>
            </li>

            <li {{ Route::is('ourteam.index') ? 'class=active' : '' }}>
                <a href="{{ route('ourteam.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Teams</p>
                </a>
            </li>
            @endrole

            @role('writer|super-admin|admin')
            <li {{ Route::is('articles.index') ? 'class=active' : '' }}>
                <a href="{{ route('articles.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Articles</p>
                </a>
            </li>
            <li {{ Route::is('subscriptionDetails') ? 'class=active' : '' }}>
                <a href="{{ route('subscriptionDetails') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Subscriptions</p>
                </a>
            </li>
            <li {{ Route::is('income.tax.return.list') ? 'class=active' : '' }}>
                <a href="{{ route('income.tax.return.list') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Income Tax Return</p>
                </a>
            </li>
            <li {{ Route::is('insta.tax.return.list') ? 'class=active' : '' }}>
                <a href="{{ route('insta.tax.return.list') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Insta Tax Return</p>
                </a>
            </li>
            @endrole

            @role('user')
            <li {{ Route::is('subscriptions.index') ? 'class=active' : '' }}>
                <a href="{{ route('subscriptions.index') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <p>Record/Work Status</p>
                </a>
            </li>
            @endrole


            @role('freelancer')
            <li class="ml-5"><a href="{{ route('freelancer.project') }}">Insta Efilling</a></li>
            <li class="ml-5"><a href="{{ route('freelancer.project.incometaxreturn') }}">Income Tax
                    Return</a></li>
            @endrole


            {{-- @php
          $paydone = App\UserPayment::where('user_id', auth()->id())->where('is_active', true)->where('order_status','Success')->first();

          //dd($paydone, auth()->id());
      @endphp
      @if ($paydone)

      <li {{Route::is('')||Route::is('')||Route::is('') ? 'class=active':''}}>
            <a data-toggle="collapse" href="#services" aria-expanded="false" class="collapsed">
                <i class="fa fa-list"></i>
                <p>Forms</p>
                <b class="caret"></b>
            </a>
            <div class="collapse" id="services" aria-expanded="false" style="height: 0px;">
                <ul class="nav">
                    @if ($paydone->user_plan_id == 1)

                    <li {{Route::is('gstform') ? 'class=active':''}}>
                        <a href="{{route('gstform')}}" target="_blank">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Gst Registration</p>
                        </a>
                    </li>
                    @endif

                    @if ($paydone->user_plan_id == 2)

                    <li {{Route::is('gstform') ? 'class=active':''}}>
                        <a href="{{route('gstform')}}" target="_blank">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Gst Registration</p>
                        </a>
                    </li>

                    <li {{Route::is('memeform') ? 'class=active':''}}>
                        <a href="{{route('memeform')}}" target="_blank">
                            <i class="nc-icon nc-single-02"></i>
                            <p>MSME Form</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            </li>
            @endif --}}

        </ul>
    </div>
</div>