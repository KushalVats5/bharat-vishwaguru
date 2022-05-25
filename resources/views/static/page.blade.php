@extends('site-layout')
@section('banner')
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
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
                        {{-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem </p> --}}
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
                            $images = json_decode($content->page_image, true);     
                        @endphp
                        @if ($content->page_image)
                        <img src="{{$images['banner']}}" alt="image" width="1157" height="380">  
                            
                        @else
                        <img src="../storage/default/default.png" alt="image" width="1157" height="380">
                            
                        @endif
                            
                    </div>
                    <div class="pg-blog-main">
                        <h2 class="pg-blog-title">{{$content->sub_heading}}</h2>
                        <ul class="pg-blog-meta">
                            <li>{{$content->created_at}}</li>
                            <li><a href="#">RASEL MAHMUD.</a></li>
                            <li><a href="#">4 comments</a></li>
                        </ul>
                        <div class="pg-blog-content clearfix">
                            <p>{!!$content->content!!}</p>
                            
                            {{-- <img src="images/blog/blogdetails/blog-details-field.jpg" alt="blog details field" class="alignright"> --}}
                        </div>
                    </div>
                </article>
            </div><!--// BLog Details -->
        </div>
    </div>   
@stop
