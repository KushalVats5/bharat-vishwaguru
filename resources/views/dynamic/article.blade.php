@extends('site-layout')
@section('banner')
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="cr-breadcrumb">
                        <ul class="cr-breadcrumb__pagination">
                            <li>
                                <a href="{{ route('root') }}">Home</a>
                            </li>
                            <li>{{ $content->title }}</li>
                        </ul>
                        <h1>{{ $content->title }}</h1>
                        {{-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam --}}
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="cr-section pg-blogs-area section-padding--xlg bg--white">
    <div class="container">
        <div class="row">

            <!-- Blogs -->
            <div class="col-lg-8">
                <article class="pg-blog">
                    <div class="pg-blog-thumb mt-5">
                        @php
                            $images = json_decode($content->article_image, true);
                            //dd($images);
                        @endphp
                        @if ($content->article_image)
                            <img src="{{ $images['banner'] }}" alt="blog details field" width="1000px" height="400px" />
                        @else
                            <img src="../storage/default/default.png" alt="" width="1000px" height="400px">
                        @endif
                    </div>
                    <div class="pg-blog-main">
                        <h2 class="pg-blog-title">{{ $content->title }}</h2>
                        <ul class="pg-blog-meta">
                            <li>{{ date('M d', strtotime($content->created_at)) }}</li>
                            @php
                                $user = App\User::find($content->user_id);
                            @endphp
                            <li><a href="#">{{ $user->name }}</a></li>
                            <li><a href="#">4 comments</a></li>
                            {{-- <li><a href="#">Categoroy -> {{$content->category->title}}</a></li> --}}

                        </ul>
                        <div class="pg-blog-content clearfix">
                            {!! $content->content !!}

                        </div>
                    </div>
                </article>
            </div>
            <!--// BLog Details -->
            <!-- Sidebar -->
            @include('layouts.partials.right-sideBar')
            <!--// Sidebar -->
        </div>
    </div>
    </div>
@stop
