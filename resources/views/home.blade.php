@extends('layouts.app')

@section('content')
<div class="wrapper ">
    @include('layouts.partials.side-bar')
    <div class="main-panel">
        <!-- nav bar include -->
        @include('layouts.partials.nav')
        @include('errors.custom-message')
        <!-- include dashboard -->
        @if(Route::is('home'))
        @include('layouts.partials.dashboard')

        @endif

        @yield('index')

        <!-- @include('layouts.partials.dashboard')   -->
        <!-- include footer -->
        @include('layouts.partials.footer')
    </div>
</div>
@endsection