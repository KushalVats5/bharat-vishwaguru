@extends('layouts.client-auth')
{{-- @extends('site-layout') --}}
@section('content')

<div class="content-box blog article">
    <div class="today-blog">
    {{-- <h3 class="mb-2">What's in blog today</h3> --}}
        <div class="card">
            <div class="card-body">
                @if ($content->page_image)
                        @php
                        $image = json_decode($content->page_image);
                        @endphp

                            <img src="{{ $image->banner }}" alt="blog banner" width="" height="">

                        @else
                            <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog banner">
                        @endif
                <h2>{{$content->title}}</h2>
                <div class="row">
                    <div class="col-md-2">
                        <div class="social-media">
                            <a href="#">
                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.5 0C8.28371 0 0 8.28371 0 18.5C0 28.7163 8.28371 37 18.5 37C28.7163 37 37 28.7163 37 18.5C37 8.28371 28.7163 0 18.5 0ZM27.3907 13.9452C27.4031 14.1393 27.4031 14.3416 27.4031 14.5398C27.4031 20.6019 22.7864 27.5848 14.3499 27.5848C11.7483 27.5848 9.33672 26.8291 7.30502 25.5283C7.67667 25.5696 8.03181 25.5862 8.41172 25.5862C10.559 25.5862 12.5329 24.8594 14.1062 23.6288C12.0911 23.5875 10.398 22.2661 9.81987 20.4491C10.526 20.5523 11.1619 20.5523 11.8887 20.3665C10.8511 20.1557 9.91846 19.5922 9.24924 18.7716C8.58003 17.9511 8.21551 16.9242 8.21763 15.8654V15.8076C8.82467 16.1503 9.53906 16.3609 10.2865 16.3898C9.65817 15.9711 9.14287 15.4038 8.78631 14.7382C8.42974 14.0726 8.24292 13.3293 8.24241 12.5742C8.24241 11.7194 8.4654 10.939 8.86596 10.2617C10.0177 11.6795 11.4548 12.8391 13.0841 13.6651C14.7133 14.4911 16.4981 14.965 18.3224 15.056C17.6741 11.9383 20.0031 9.41518 22.8029 9.41518C24.1243 9.41518 25.3136 9.96853 26.1519 10.8605C27.1884 10.6664 28.1795 10.2782 29.0632 9.75792C28.7204 10.8192 28.0019 11.7153 27.048 12.281C27.973 12.1819 28.865 11.9259 29.6908 11.5666C29.0673 12.4834 28.2868 13.2969 27.3907 13.9452Z" fill="#00C4FF" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 18.6033C0 27.8009 6.68004 35.4491 15.4167 37V23.6384H10.7917V18.5H15.4167V14.3884C15.4167 9.76338 18.3967 7.19496 22.6116 7.19496C23.9467 7.19496 25.3866 7.4 26.7217 7.60504V12.3333H24.3583C22.0967 12.3333 21.5833 13.4634 21.5833 14.9033V18.5H26.5167L25.695 23.6384H21.5833V37C30.32 35.4491 37 27.8024 37 18.6033C37 8.37125 28.675 0 18.5 0C8.325 0 0 8.37125 0 18.6033Z" fill="#3C5A9A" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg width="37" height="32" viewBox="0 0 37 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.8929 0C10.8415 0 9.83313 0.421427 9.08968 1.17157C8.34624 1.92172 7.92857 2.93913 7.92857 4V5.33333H5.28571C3.88386 5.33333 2.53941 5.89524 1.54815 6.89543C0.556886 7.89562 0 9.25218 0 10.6667V22.6667C0 23.7275 0.417665 24.7449 1.16111 25.4951C1.90456 26.2452 2.91289 26.6667 3.96429 26.6667H7.92857V28C7.92857 29.0609 8.34624 30.0783 9.08968 30.8284C9.83313 31.5786 10.8415 32 11.8929 32H25.3714C26.4228 32 27.4312 31.5786 28.1746 30.8284C28.918 30.0783 29.3357 29.0609 29.3357 28V26.6667H33.0357C34.0871 26.6667 35.0954 26.2452 35.8389 25.4951C36.5823 24.7449 37 23.7275 37 22.6667V10.6667C37 9.25218 36.4431 7.89562 35.4518 6.89543C34.4606 5.89524 33.1161 5.33333 31.7143 5.33333H29.0714V4C29.0714 2.93913 28.6538 1.92172 27.9103 1.17157C27.1669 0.421427 26.1585 0 25.1071 0H11.8929ZM26.4286 5.33333H10.5714V4C10.5714 3.64638 10.7107 3.30724 10.9585 3.05719C11.2063 2.80714 11.5424 2.66667 11.8929 2.66667H25.1071C25.4576 2.66667 25.7937 2.80714 26.0415 3.05719C26.2894 3.30724 26.4286 3.64638 26.4286 4V5.33333ZM11.8929 21.3333H25.3714C25.7219 21.3333 26.058 21.4738 26.3058 21.7239C26.5536 21.9739 26.6929 22.313 26.6929 22.6667V28C26.6929 28.3536 26.5536 28.6928 26.3058 28.9428C26.058 29.1929 25.7219 29.3333 25.3714 29.3333H11.8929C11.5424 29.3333 11.2063 29.1929 10.9585 28.9428C10.7107 28.6928 10.5714 28.3536 10.5714 28V22.6667C10.5714 22.313 10.7107 21.9739 10.9585 21.7239C11.2063 21.4738 11.5424 21.3333 11.8929 21.3333Z" fill="#3A3A3A" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content-box-right">
                            {!!$content->content!!}
                            {{-- <div class="user">
                                <img src="./images/PIC.png" alt="pic">
                                <div class="user-name">
                                    <h6>John Smith</h6>
                                    <p>3.4K views • 1 month ago</p>
                                </div>
                            </div>
                            <div class="comment-box">
                                <h5>112 Comments <a href="#">View Less</a></h5>
                                <div class="comment">
                                    <img src="./images/PIC.png" alt="pic">
                                    <div class="comment-input">
                                        <input type="text" placeholder="comment">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="more-from">
        <h3>More from Bharat</h3>
        <div class="row">
            @foreach ($moreArticles as $mArticle)
                <div class="col-md-3">
                    <div class="blog-box">
                        @if ($mArticle->post_type == 'video')
                        {{-- <video controls>
                            <source src="{{ asset('site/images/dumy.mp4')}}" type="video/mp4" media="all and (max-width: 480px)">
                        </video> --}}
                        <img src="{{ asset('site/images/blog-1.png')}}" alt="blog-1">
                        @else
                            <img src="{{ asset('site/images/blog-1.png')}}" alt="blog-1">
                        @endif
                        <span class="type">{{ucwords($mArticle->post_type)}}</span>
                        @if ($article->post_type == 'blog')
                        <a href="{{route('dynamicArticle',$article->slug)}}"><p>{{$article->title}}</p></a>
                        @endif
                        @if ($article->post_type == 'video')
                        <a href="{{route('dynamicArticleVideo',$article->slug)}}"><p>{{$article->title}}</p></a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection