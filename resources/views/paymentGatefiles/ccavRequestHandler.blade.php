@extends('site-layout')
@section('banner')
{{-- <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="cr-breadcrumb">
                    <ul class="cr-breadcrumb__pagination">
                        <li>
                            <a href="{{route('root')}}">Home</a>
                        </li>
                        <li>{{$content->title}}</li>
                    </ul>
                    <h1>{{$content->title}}</h1>
                    <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                        rem </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@stop
@section('content')
<div class="container">
<?php 

?>
<form method="post" name="redirect" action="http://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
    {{-- @csrf --}}
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
<?php 
// dd($encrypted_data);
?>

@stop
@section('script')
<script language='javascript'>document.redirect.submit();</script>  
@stop

