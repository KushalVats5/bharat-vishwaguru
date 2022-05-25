@extends('home')

@section('title')
	FreeLancer
@endsection

@section('extra-css')
@endsection

@section('index')

<div class="d-flex justify-content-between mt-5 p-5">
    <div>
        @if ($user_gstform != null)
        <h4>GST form</h4>
        Business Name : {{$user_gstform->bname}}
            
        @else
        <h4>User Does not Fill Form</h4>
            
        @endif
    </div>

    <div>
        @if ($user_msmeform != null)
        <h4>Msme Form</h4>
        Business Name : {{$user_msmeform->businessName}}  
        @else
        <h4>User Does not Fill Form</h4>
            
        @endif

    </div>

</div>
@endsection

@section('extra-script')

@endsection
