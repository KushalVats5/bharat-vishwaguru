@extends('layouts.client-auth')

@section('content')

<div class="content-box profile-page user-dashboard">
    <div class="container">
        <h3>{{__('User Dashboard')}}</h3>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}

    </div>
</div>
@endsection