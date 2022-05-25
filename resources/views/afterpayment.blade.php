This is for demo after payment 

@php
    $user = auth()->id();
    $data = App\UserPlan::where(['user_id' => $user])->first();
    //$plan_id = App\Plan::pluck('id');
   
@endphp

<br><br>


@if ($data->plan_id == 1)
<a href="{{route('gstform')}}">GST Application Form</a>
@elseif ($data->plan_id == 2)
<a href="{{route('gstform')}}">GST Application Form</a><br>
<a href="{{route('memeform')}}">MEME FORM</a>
@else
  // do some other thing;
@endif



