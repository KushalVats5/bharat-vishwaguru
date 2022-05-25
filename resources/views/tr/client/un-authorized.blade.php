@extends('layouts.client-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Un-authorized Access') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif

                    @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('danger') }}
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection