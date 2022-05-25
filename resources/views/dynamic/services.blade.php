@extends('site-layout')
@section('banner')
<div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="cr-breadcrumb">
                    <ul class="cr-breadcrumb__pagination">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>{{$content->title}}</li>
                    </ul>
                    <h1>{{$content->title}}</h1>
                    {{-- <p>{{$content->sub_heading}}</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="container">
    <div class="row">

        <!-- BLog Details -->
        <div class="col-lg-12">
            <article class="pg-blog">
                <div class="pg-blog-thumb mt-5">
                        @php
                            $images = json_decode($content->service_image, true);
                            //dd($images);
                        @endphp
                        @if ($content->service_image)
                        <img src="{{$images['banner']}}" alt="blog details field" />                      
                        @else
                        <img src="{{asset('storage/default/default.png')}}" alt="" >      
                        @endif
                </div>
                <div class="pg-blog-main">
                    <h2 class="pg-blog-title">{{$content->title}}</h2>
                    <ul class="pg-blog-meta">
                        <li>{{date('M d', strtotime($content->created_at))}}</li>
                        
                        @php
                        $user = App\User::find($content->user_id);
                        @endphp

                        @if ($user != null)
                        <li><a href="#">{{$user->name}}</a></li>
                            
                        @endif
                        <li><a href="#">4 comments</a></li>
                        {{-- <li><a href="#">Categoroy -> {{$content->category->title}}</a></li> --}}
                        
                    </ul>
                    <div class="pg-blog-content clearfix">
                        {!! $content->content !!}
                        
                        <a href="{{route('income.tax.return')}}"> <button class="btn btn-success" style=" margin-left:40%;">Start Now</button></a>
                    </div>
                </div>
            </article>
        </div>
        <!--// BLog Details -->
    </div>
</div>
@stop