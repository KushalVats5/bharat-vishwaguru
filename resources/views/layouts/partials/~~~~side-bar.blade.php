<div class="sidebar" data-color="white" data-active-color="danger">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ url('storage/profile-pic') }}/{{ Auth::user()->avatar }}"
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

            @role('super-admin|admin')
            <li
                {{ Route::is('roles.index') || Route::is('roles.create') || Route::is('roles.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#roles" aria-expanded="false" class="collapsed">
                    <i class="nc-icon nc-bank"></i>
                    <p>Manage Roles</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="roles" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('roles.index') ? 'class=active' : '' }}>
                            <a href="{{ route('roles.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All Roles</p>
                            </a>
                        </li>
                        <li {{ Route::is('roles.create') ? 'class=active' : '' }}>
                            <a href="{{ route('roles.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New Role</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                {{ Route::is('permissions.index') || Route::is('permissions.create') || Route::is('permissions.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#permissions" aria-expanded="false" class="collapsed">
                    <i class="nc-icon nc-bank"></i>
                    <p>Manage permissions</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="permissions" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('permissions.index') ? 'class=active' : '' }}>
                            <a href="{{ route('permissions.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All Permissions</p>
                            </a>
                        </li>
                        <li {{ Route::is('permissions.create') ? 'class=active' : '' }}>
                            <a href="{{ route('permissions.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New Permission</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                {{ Route::is('users.index') || Route::is('users.create') || Route::is('users.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#users" aria-expanded="false" class="collapsed">
                    <i class="fa fa-users"></i>
                    <p>Manage Users</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="users" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('users.index') ? 'class=active' : '' }}>
                            <a href="{{ route('users.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li {{ Route::is('users.create') ? 'class=active' : '' }}>
                            <a href="{{ route('users.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New User</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                {{ Route::is('pages.index') || Route::is('pages.create') || Route::is('pages.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#pages" aria-expanded="false" class="collapsed">
                    <i class="fa fa-list"></i>
                    <p>Manage Pages</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="pages" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('pages.index') ? 'class=active' : '' }}>
                            <a href="{{ route('pages.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All Pages</p>
                            </a>
                        </li>
                        <li {{ Route::is('pages.create') ? 'class=active' : '' }}>
                            <a href="{{ route('pages.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New Page</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li {{Route::is('plans.index')||Route::is('plans.create')||Route::is('plans.edit') ? 'class=active':''}}>
        <a data-toggle="collapse" href="#plans" aria-expanded="false" class="collapsed">
          <i class="fa fa-list"></i>
          <p>Manage plans</p>
          <b class="caret"></b>
        </a>
        <div class="collapse" id="plans" aria-expanded="false" style="height: 0px;">
          <ul class="nav">
            <li {{Route::is('plans.index') ? 'class=active':''}}>
              <a href="{{route('plans.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>All plans</p>
              </a>
            </li>
            <li {{Route::is('plans.create') ? 'class=active':''}}>
              <a href="{{route('plans.create')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>New plans</p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li {{Route::is('features.index')||Route::is('features.create')||Route::is('features.edit') ? 'class=active':''}}>
        <a data-toggle="collapse" href="#features" aria-expanded="false" class="collapsed">
          <i class="fa fa-list"></i>
          <p>Manage features</p>
          <b class="caret"></b>
        </a>
        <div class="collapse" id="features" aria-expanded="false" style="height: 0px;">
          <ul class="nav">
            <li {{Route::is('features.index') ? 'class=active':''}}>
              <a href="{{route('features.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>All features</p>
              </a>
            </li>
            <li {{Route::is('features.create') ? 'class=active':''}}>
              <a href="{{route('features.create')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>New features</p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li {{Route::is('categories.index')||Route::is('categories.create')||Route::is('categories.edit') ? 'class=active':''}}>
        <a data-toggle="collapse" href="#categories" aria-expanded="false" class="collapsed">
          <i class="fa fa-list"></i>
          <p>Manage categories</p>
          <b class="caret"></b>
        </a>
        <div class="collapse" id="categories" aria-expanded="false" style="height: 0px;">
          <ul class="nav">
            <li {{Route::is('categories.index') ? 'class=active':''}}>
              <a href="{{route('categories.index')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>All categories</p>
              </a>
            </li>
            <li {{Route::is('categories.create') ? 'class=active':''}}>
              <a href="{{route('categories.create')}}">
                <i class="nc-icon nc-single-02"></i>
                <p>New categories</p>
              </a>
            </li>
          </ul>
        </div>
      </li> --}}

            <li
                {{ Route::is('services.index') || Route::is('services.create') || Route::is('services.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#services" aria-expanded="false" class="collapsed">
                    <i class="fa fa-list"></i>
                    <p>Manage services</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="services" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('services.index') ? 'class=active' : '' }}>
                            <a href="{{ route('services.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All services</p>
                            </a>
                        </li>
                        <li {{ Route::is('services.create') ? 'class=active' : '' }}>
                            <a href="{{ route('services.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New services</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li
                {{ Route::is('testimonial.index') || Route::is('testimonial.create') || Route::is('testimonial.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#testimonial" aria-expanded="false" class="collapsed">
                    <i class="fa fa-list"></i>
                    <p>Manage Testimonial</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="testimonial" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('testimonial.index') ? 'class=active' : '' }}>
                            <a href="{{ route('testimonial.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All Testimonial</p>
                            </a>
                        </li>
                        <li {{ Route::is('testimonial.create') ? 'class=active' : '' }}>
                            <a href="{{ route('testimonial.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New Testimonial</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li
                {{ Route::is('ourteam.index') || Route::is('ourteam.create') || Route::is('ourteam.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#ourteam" aria-expanded="false" class="collapsed">
                    <i class="fa fa-list"></i>
                    <p>Manage OurTeam</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="ourteam" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('ourteam.index') ? 'class=active' : '' }}>
                            <a href="{{ route('ourteam.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All OurTeam</p>
                            </a>
                        </li>
                        <li {{ Route::is('ourteam.create') ? 'class=active' : '' }}>
                            <a href="{{ route('ourteam.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New OurTeam</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li class="ml-5"><a href="{{route('freelancer.index')}}">FreeLancers</a></li> --}}





            @endrole

            @role('writer|super-admin|admin')
            <li
                {{ Route::is('articles.index') || Route::is('articles.create') || Route::is('articles.edit') ? 'class=active' : '' }}>
                <a data-toggle="collapse" href="#articles" aria-expanded="false" class="collapsed">
                    <i class="fa fa-list"></i>
                    <p>Manage Articles</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="articles" aria-expanded="false" style="height: 0px;">
                    <ul class="nav">
                        <li {{ Route::is('articles.index') ? 'class=active' : '' }}>
                            <a href="{{ route('articles.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>All Articles</p>
                            </a>
                        </li>
                        <li {{ Route::is('articles.create') ? 'class=active' : '' }}>
                            <a href="{{ route('articles.create') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>New Article</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="ml-5"><a href="{{route('tickets.index')}}">Tickets</a></li> --}}

            <li class="ml-5"><a href="{{ route('subscriptionDetails') }}">subscription details</a></li>

            <li class="ml-5 {{ Route::is('income.tax.return.list') ? 'active' : '' }}"><i
                    class="nc-icon nc-single-02"></i><a href="{{ route('income.tax.return.list') }}">Income Tax
                    Return</a></li>

            <li class="ml-5 {{ Route::is('insta.tax.return.lis') ? 'active' : '' }}"><i
                    class="nc-icon nc-single-02"></i><a href="{{ route('insta.tax.return.list') }}">Insta Tax
                    Return</a></li>
            @endrole

            <li {{ Route::is('profile.index') ? 'class=active' : '' }}>
                <a href="{{ route('profile.index') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <p>User Profile</p>
                </a>
            </li>

            @role('user')
            <li {{ Route::is('subscriptions.index') ? 'class=active' : '' }}>
                <a href="{{ route('subscriptions.index') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <p>Record/Work Status</p>
                </a>
            </li>
            @endrole


            {{-- for freelancer functionality other state related --}}
            {{-- @role('freelancer')
      <li class="ml-5"><a href="{{route('freelancer.tasks')}}">Tasks</a></li>
      @endrole --}}

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
