@extends('layouts.admin-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User') }}</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('tr/admin/user/save') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id??'' }}">
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name ?? old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email ?? old('email') }}" required
                                    autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ $user->mobile ?? old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>
                            <div class="col-md-6">
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="">-Select-</option>
                                    <option value="1" @if(isset($user->is_active) and $user->is_active==1 )
                                        selected="selected" @endif >Active</option>
                                    <option value="0" @if(isset($user->is_active) and $user->is_active==0 )
                                        selected="selected" @endif >Deactive</option>
                                </select>

                                @error('is_active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection