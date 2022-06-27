@extends('layouts.client-auth')
{{-- @extends('site-layout') --}}
@section('content')

<div class="content-box profile-page">
    <div class="container">
        <h3>Personal Infomation</h3>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="mt-5">
            @include('errors.custom-message')
        </div>
        <div class="clearfix" style="clear: both;"></div>
        <form method="POST" action="{{ route('tr/user/profile/update') }}" enctype="multipart/form-data">
            @csrf
            <div class="profile-pic">
                @php
                    $avatar = auth()->user()->avatar;
                @endphp
                {{-- @if (Storage::disk('public')->exists('app/public/'.$avatar)) --}}
                <img src="{{Storage::url($avatar)}}" alt="profile">
                {{-- @endif --}}
                {{-- <img src="{{ asset('site/images/profile.png')}}" alt="profile"> --}}
                <div class="upload-pic">
                    <label class="change-pic">
                        <input type="file" name="avatar">
                        Change Pic
                    </label>
                    <label class="remove">

                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 3.33333L4.4 1H9.6L10 3.33333" stroke="#F20305" stroke-linejoin="round" />
                            <path d="M1 3.33325H13" stroke="#F20305" stroke-linecap="round" />
                            <path d="M11.3337 3.33325L10.667 13.6666H3.33366L2.66699 3.33325H11.3337Z" stroke="#F20305" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.33301 11H8.66634" stroke="#F20305" stroke-linecap="round" />
                        </svg>

                        Remove
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <fieldset>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{Auth::user()->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </fieldset>
                </div>

                <div class="col-md-5">
                    <fieldset>
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{Auth::user()->mobile}}">
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <fieldset>
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </fieldset>
                </div>
            </div>
            <div class="gender">
                <div class="input-box">
                    <input type="radio" name="gender" value="Male" {{(Auth::user()->gender == 'Male') ? 'checked' : '' }}>
                    <label>
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.2032 0V3.15923H32.607L20.4624 15.3049C17.9146 13.3255 14.7081 12.3915 11.4958 12.6932C8.28349 12.9949 5.30698 14.5096 3.17235 16.9288C1.03772 19.3481 -0.0945192 22.4899 0.00618474 25.7146C0.106889 28.9393 1.43296 32.0044 3.71439 34.2858C5.99581 36.5671 9.06103 37.8931 12.2859 37.9938C15.5107 38.0945 18.6527 36.9623 21.072 34.8278C23.4914 32.6932 25.0061 29.7169 25.3078 26.5047C25.6095 23.2926 24.6756 20.0862 22.696 17.5385L34.8406 5.39281V15.7962H38V0H22.2032ZM12.7251 34.7516C10.8505 34.7516 9.01799 34.1957 7.45932 33.1543C5.90066 32.1129 4.68582 30.6327 3.96845 28.9008C3.25107 27.169 3.06338 25.2634 3.42909 23.4249C3.79481 21.5864 4.69751 19.8976 6.02304 18.5721C7.34858 17.2466 9.03741 16.344 10.876 15.9783C12.7146 15.6126 14.6203 15.8003 16.3522 16.5176C18.0841 17.235 19.5644 18.4497 20.6058 20.0083C21.6473 21.5669 22.2032 23.3994 22.2032 25.2739C22.2002 27.7866 21.2007 30.1956 19.4239 31.9724C17.647 33.7492 15.2379 34.7487 12.7251 34.7516Z" fill="#5F5F5F" />
                        </svg>
                        Male
                        <span></span>
                    </label>
                </div>
                <div class="input-box">
                    <input type="radio" name="gender" value="Female" {{(Auth::user()->gender == 'Female') ? 'checked' : '' }}>
                    <label>
                        <svg width="31" height="44" viewBox="0 0 31 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5 28.5001C18.7887 28.5001 21.9427 27.1937 24.2681 24.8682C26.5936 22.5428 27.9 19.3888 27.9 16.1001C27.9 12.8114 26.5936 9.65742 24.2681 7.33197C21.9427 5.00652 18.7887 3.7001 15.5 3.7001C12.2113 3.7001 9.05733 5.00652 6.73187 7.33197C4.40642 9.65742 3.1 12.8114 3.1 16.1001C3.1 19.3888 4.40642 22.5428 6.73187 24.8682C9.05733 27.1937 12.2113 28.5001 15.5 28.5001ZM15.5 31.6001C11.3891 31.6001 7.44666 29.9671 4.53984 27.0603C1.63303 24.1534 0 20.211 0 16.1001C0 11.9892 1.63303 8.04676 4.53984 5.13994C7.44666 2.23313 11.3891 0.600098 15.5 0.600098C19.6109 0.600098 23.5533 2.23313 26.4602 5.13994C29.367 8.04676 31 11.9892 31 16.1001C31 20.211 29.367 24.1534 26.4602 27.0603C23.5533 29.9671 19.6109 31.6001 15.5 31.6001Z" fill="#5F5F5F" />
                            <path d="M15.5002 28.5C16.5335 28.5 17.0502 29.0167 17.0502 30.05V42.45C17.0502 43.4833 16.5335 44 15.5002 44C14.4669 44 13.9502 43.4833 13.9502 42.45V30.05C13.9502 29.0167 14.4669 28.5 15.5002 28.5Z" fill="#5F5F5F" />
                            <path d="M7.7502 36.25H23.2502C24.2835 36.25 24.8002 36.7667 24.8002 37.8C24.8002 38.8333 24.2835 39.35 23.2502 39.35H7.7502C6.71686 39.35 6.2002 38.8333 6.2002 37.8C6.2002 36.7667 6.71686 36.25 7.7502 36.25Z" fill="#5F5F5F" />
                        </svg>
                        Female
                        <span></span>
                    </label>
                </div>
            </div>
            <p class="terms">Terms and condition text comes here Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam imperdiet odio nunc, non rutrum nunc vulputate quis. Morbi et nunc magna. Nullam imperdiet turpis eget sem semper blandit.</p>
            <div class="action-btn">
                <button type="submit" class="update btn" type="submit">Update</button>
                <button class="btn">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection