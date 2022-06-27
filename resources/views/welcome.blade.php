@extends('site-layout')
@section('content')
<div class="content-box">
    <div class="row">
        <div class="col-md-8">
            <div class="what-new">
                <h3>What's New</h3>
                <div class="card">
                    <div class="card-body">
                        @if (Storage::disk('public')->exists('uploads/videos/' . $video->video_file))
                        <video controls>
                            <source src="{{ Storage::url('uploads/videos/' . $video->video_file) }}" type="video/mp4">
                        </video>
                        @else
                        <video controls>
                            <source src="{{ asset('site/images/dumy.mp4') }}" type="video/mp4">
                        </video>
                        @endif
                        <p>{{ $video->title }}</p>
                        <div class="bottom-part">
                            <div class="left">
                                <a href="#">
                                    <svg width="24" height="24" viewBox="0 0 29 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.8 20.3159V21.3159V25.2247C6.80034 25.3878 6.85398 25.5471 6.95396 25.6786C7.08502 25.8479 7.27901 25.9612 7.49546 25.9917C7.53448 25.9972 7.57358 26 7.6125 26V25.2003V24.2003H7.61794V25.2003V26C7.79349 25.999 7.96494 25.943 8.10693 25.8392L6.8 20.3159ZM6.8 20.3159H5.8H4.7125C2.64307 20.3159 1 18.6766 1 16.697V4.61886C1 2.63928 2.64307 1 4.7125 1H24.2875C26.3569 1 28 2.63928 28 4.61886V16.697C28 18.6781 26.3572 20.3159 24.2875 20.3159H15.9681H15.6408L15.3769 20.5094L8.10749 25.8388L6.8 20.3159Z"
                                            stroke="#CACEE6" stroke-width="2" />
                                    </svg>
                                    310
                                </a>
                                <a href="#" class="like-count saveLikeDislike" data-type="like"
                                    data-post="{{ $video->id}}">
                                    <span class="" data-type="like" data-post="{{ $video->id}}"></span>
                                    <svg width="24" height="24" viewBox="0 0 29 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M26.1799 15.1144C26.7266 14.3921 27.0291 13.5071 27.0291 12.5863C27.0291 11.1254 26.2125 9.7426 24.898 8.97148C24.5596 8.77299 24.1743 8.66853 23.782 8.66889H15.9797L16.175 4.67015C16.2205 3.70381 15.8789 2.78628 15.2151 2.08675C14.8894 1.74195 14.4964 1.46762 14.0604 1.2807C13.6245 1.09379 13.1548 0.998259 12.6805 1.00002C10.9886 1.00002 9.49194 2.1388 9.04293 3.76889L6.24804 13.8878H6.23828V27.8134H21.6053C21.9046 27.8134 22.1975 27.7548 22.4675 27.6377C24.0163 26.9772 25.0151 25.4643 25.0151 23.7854C25.0151 23.3754 24.9566 22.972 24.8394 22.5815C25.3861 21.8592 25.6886 20.9742 25.6886 20.0534C25.6886 19.6435 25.6301 19.24 25.5129 18.8496C26.0596 18.1273 26.3621 17.2423 26.3621 16.3215C26.3556 15.9115 26.2971 15.5048 26.1799 15.1144V15.1144Z"
                                            stroke="#CACEE6" stroke-width="2" />
                                        <path
                                            d="M1 14.9289V26.7722C1 27.3481 1.46527 27.8133 2.04117 27.8133H4.15605V13.8877H2.04117C1.46527 13.8877 1 14.353 1 14.9289Z"
                                            stroke="#CACEE6" stroke-width="2" />
                                    </svg>
                                    <span class="likeDislike" data-type="dislike" data-post="{{ $video->id}}">{{
                                        $video->likes() }}</span>
                                </a>
                                <a href="#" class="dislike-count saveLikeDislike" data-type="dislike"
                                    data-post="{{ $video->id}}">

                                    <svg width="24" height="24" viewBox="0 0 29 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M26.1799 13.6991C26.7266 14.4214 27.0291 15.3064 27.0291 16.2272C27.0291 17.6881 26.2125 19.0709 24.898 19.842C24.5596 20.0405 24.1743 20.1449 23.782 20.1446L15.9797 20.1446L16.175 24.1433C16.2205 25.1097 15.8789 26.0272 15.2151 26.7267C14.8894 27.0715 14.4964 27.3459 14.0604 27.5328C13.6245 27.7197 13.1548 27.8152 12.6805 27.8135C10.9886 27.8135 9.49194 26.6747 9.04293 25.0446L6.24804 14.9257L6.23828 14.9257L6.23828 1.00007L21.6053 1.00006C21.9046 1.00006 22.1975 1.05863 22.4675 1.17576C24.0163 1.83626 25.0151 3.3492 25.0151 5.02809C25.0151 5.43805 24.9566 5.84151 24.8394 6.23194C25.3861 6.95426 25.6886 7.83925 25.6886 8.76004C25.6886 9.17 25.6301 9.57345 25.5129 9.96389C26.0596 10.6862 26.3621 11.5712 26.3621 12.492C26.3556 12.9019 26.2971 13.3086 26.1799 13.6991V13.6991Z"
                                            stroke="#CACEE6" stroke-width="2" />
                                        <path
                                            d="M1 13.8846L0.999999 2.0413C0.999999 1.4654 1.46527 1.00013 2.04117 1.00013L4.15605 1.00013L4.15605 14.9258L2.04117 14.9258C1.46527 14.9258 1 14.4605 1 13.8846Z"
                                            stroke="#CACEE6" stroke-width="2" />
                                    </svg>
                                    <span class="likeDislike" data-type="dislike" data-post="{{ $video->id}}">{{
                                        $video->dislikes() }}</span>
                                </a>
                            </div>
                            <div class="right">
                                <a href="{{ $article->id }}" class="saveFavourite">
                                    <svg width="24" height="24" viewBox="0 0 29 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1" y="1" width="27" height="27" rx="2" stroke="#CACEE5"
                                            stroke-width="2" />
                                        <line x1="14.5938" y1="7.34375" x2="14.5938" y2="21.6562" stroke="#CACEE5"
                                            stroke-width="2" stroke-linecap="round" />
                                        <line x1="21.6562" y1="14.5938" x2="7.34375" y2="14.5938" stroke="#CACEE5"
                                            stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg width="24" height="24" viewBox="0 0 26 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.32009 17.3201C7.70601 17.3201 9.64019 15.3859 9.64019 13C9.64019 10.6141 7.70601 8.67993 5.32009 8.67993C2.93417 8.67993 1 10.6141 1 13C1 15.3859 2.93417 17.3201 5.32009 17.3201Z"
                                            stroke="#CACEE5" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M20.6804 25.0005C23.0664 25.0005 25.0005 23.0664 25.0005 20.6804C25.0005 18.2945 23.0664 16.3604 20.6804 16.3604C18.2945 16.3604 16.3604 18.2945 16.3604 20.6804C16.3604 23.0664 18.2945 25.0005 20.6804 25.0005Z"
                                            stroke="#CACEE5" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M20.6804 9.64019C23.0664 9.64019 25.0005 7.70601 25.0005 5.32009C25.0005 2.93417 23.0664 1 20.6804 1C18.2945 1 16.3604 2.93417 16.3604 5.32009C16.3604 7.70601 18.2945 9.64019 20.6804 9.64019Z"
                                            stroke="#CACEE5" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M9.16016 11.0803L16.8403 7.24023M9.16016 14.9204L16.8403 18.7605L9.16016 14.9204Z"
                                            stroke="#CACEE5" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="top-stories">
                <h3>Top Stories</h3>
                @foreach ($latestArticles as $lArticle)
                <div class="story-box">
                    <a href="#">
                        <img src="{{ asset('site/images/story-1.png') }}" alt="story">
                        <div class="content">
                            <p>{{ $lArticle->title }}</p>
                            <span>
                                <svg width="24" height="24" viewBox="0 0 29 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.8 20.3159V21.3159V25.2247C6.80034 25.3878 6.85398 25.5471 6.95396 25.6786C7.08502 25.8479 7.27901 25.9612 7.49546 25.9917C7.53448 25.9972 7.57358 26 7.6125 26V25.2003V24.2003H7.61794V25.2003V26C7.79349 25.999 7.96494 25.943 8.10693 25.8392L6.8 20.3159ZM6.8 20.3159H5.8H4.7125C2.64307 20.3159 1 18.6766 1 16.697V4.61886C1 2.63928 2.64307 1 4.7125 1H24.2875C26.3569 1 28 2.63928 28 4.61886V16.697C28 18.6781 26.3572 20.3159 24.2875 20.3159H15.9681H15.6408L15.3769 20.5094L8.10749 25.8388L6.8 20.3159Z"
                                        stroke="#CACEE6" stroke-width="2" />
                                </svg>
                                3109
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="today-blog">
        <div class="card">
            <div class="card-body">
                <span>what's in blog today</span>
                <h2>{{ $article->title }}</h2>
                <div class="row">
                    <div class="col-md-2">
                        <div class="social-media">
                            <a href="#">
                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.5 0C8.28371 0 0 8.28371 0 18.5C0 28.7163 8.28371 37 18.5 37C28.7163 37 37 28.7163 37 18.5C37 8.28371 28.7163 0 18.5 0ZM27.3907 13.9452C27.4031 14.1393 27.4031 14.3416 27.4031 14.5398C27.4031 20.6019 22.7864 27.5848 14.3499 27.5848C11.7483 27.5848 9.33672 26.8291 7.30502 25.5283C7.67667 25.5696 8.03181 25.5862 8.41172 25.5862C10.559 25.5862 12.5329 24.8594 14.1062 23.6288C12.0911 23.5875 10.398 22.2661 9.81987 20.4491C10.526 20.5523 11.1619 20.5523 11.8887 20.3665C10.8511 20.1557 9.91846 19.5922 9.24924 18.7716C8.58003 17.9511 8.21551 16.9242 8.21763 15.8654V15.8076C8.82467 16.1503 9.53906 16.3609 10.2865 16.3898C9.65817 15.9711 9.14287 15.4038 8.78631 14.7382C8.42974 14.0726 8.24292 13.3293 8.24241 12.5742C8.24241 11.7194 8.4654 10.939 8.86596 10.2617C10.0177 11.6795 11.4548 12.8391 13.0841 13.6651C14.7133 14.4911 16.4981 14.965 18.3224 15.056C17.6741 11.9383 20.0031 9.41518 22.8029 9.41518C24.1243 9.41518 25.3136 9.96853 26.1519 10.8605C27.1884 10.6664 28.1795 10.2782 29.0632 9.75792C28.7204 10.8192 28.0019 11.7153 27.048 12.281C27.973 12.1819 28.865 11.9259 29.6908 11.5666C29.0673 12.4834 28.2868 13.2969 27.3907 13.9452Z"
                                        fill="#00C4FF" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 18.6033C0 27.8009 6.68004 35.4491 15.4167 37V23.6384H10.7917V18.5H15.4167V14.3884C15.4167 9.76338 18.3967 7.19496 22.6116 7.19496C23.9467 7.19496 25.3866 7.4 26.7217 7.60504V12.3333H24.3583C22.0967 12.3333 21.5833 13.4634 21.5833 14.9033V18.5H26.5167L25.695 23.6384H21.5833V37C30.32 35.4491 37 27.8024 37 18.6033C37 8.37125 28.675 0 18.5 0C8.325 0 0 8.37125 0 18.6033Z"
                                        fill="#3C5A9A" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg width="37" height="32" viewBox="0 0 37 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.8929 0C10.8415 0 9.83313 0.421427 9.08968 1.17157C8.34624 1.92172 7.92857 2.93913 7.92857 4V5.33333H5.28571C3.88386 5.33333 2.53941 5.89524 1.54815 6.89543C0.556886 7.89562 0 9.25218 0 10.6667V22.6667C0 23.7275 0.417665 24.7449 1.16111 25.4951C1.90456 26.2452 2.91289 26.6667 3.96429 26.6667H7.92857V28C7.92857 29.0609 8.34624 30.0783 9.08968 30.8284C9.83313 31.5786 10.8415 32 11.8929 32H25.3714C26.4228 32 27.4312 31.5786 28.1746 30.8284C28.918 30.0783 29.3357 29.0609 29.3357 28V26.6667H33.0357C34.0871 26.6667 35.0954 26.2452 35.8389 25.4951C36.5823 24.7449 37 23.7275 37 22.6667V10.6667C37 9.25218 36.4431 7.89562 35.4518 6.89543C34.4606 5.89524 33.1161 5.33333 31.7143 5.33333H29.0714V4C29.0714 2.93913 28.6538 1.92172 27.9103 1.17157C27.1669 0.421427 26.1585 0 25.1071 0H11.8929ZM26.4286 5.33333H10.5714V4C10.5714 3.64638 10.7107 3.30724 10.9585 3.05719C11.2063 2.80714 11.5424 2.66667 11.8929 2.66667H25.1071C25.4576 2.66667 25.7937 2.80714 26.0415 3.05719C26.2894 3.30724 26.4286 3.64638 26.4286 4V5.33333ZM11.8929 21.3333H25.3714C25.7219 21.3333 26.058 21.4738 26.3058 21.7239C26.5536 21.9739 26.6929 22.313 26.6929 22.6667V28C26.6929 28.3536 26.5536 28.6928 26.3058 28.9428C26.058 29.1929 25.7219 29.3333 25.3714 29.3333H11.8929C11.5424 29.3333 11.2063 29.1929 10.9585 28.9428C10.7107 28.6928 10.5714 28.3536 10.5714 28V22.6667C10.5714 22.313 10.7107 21.9739 10.9585 21.7239C11.2063 21.4738 11.5424 21.3333 11.8929 21.3333Z"
                                        fill="#3A3A3A" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content-box-right">
                            {!! $article->content !!}
                            <div class="user">
                                <img src="{{ asset('site/images/PIC.png') }}" alt="pic">
                                <div class="user-name">
                                    <h6>{{ $article->author->name }}</h6>
                                    <p>3.4K views • {{ Helper::timeAgo($article->created_at) }}</p>
                                </div>
                            </div>
                            <div class="comment-box">
                                <h5>112 Comments <a href="#">View Less</a></h5>
                                <div class="comment">
                                    <img src="{{ asset('site/images/PIC.png') }}" alt="pic">
                                    <div class="comment-input">
                                        <input type="text" placeholder="comment">
                                    </div>
                                </div>
                            </div>
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
                    @if (Storage::disk('public')->exists('uploads/videos/' . $mArticle->video_file))
                    <video controls>
                        <source src="{{ Storage::url('uploads/videos/' . $mArticle->video_file) }}" type="video/mp4">
                    </video>
                    @endif
                    @endif
                    @if ($mArticle->post_type == 'article')
                    @if ($mArticle->article_image)
                    @php
                    $image = json_decode($mArticle->article_image);
                    //dd($image);
                    @endphp
                    <a href="{{ route('dynamicArticle', $mArticle->slug) }}" target="_blank" class="avatar border-gray">
                        <img src="{{ $image->thumbnail }}" alt="blog thumb" width="" height="">
                    </a>
                    @else
                    <a href="{{ route('dynamicArticle', $mArticle->slug) }}" target="_blank" class="avatar border-gray">
                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog thumb">
                    </a>
                    @endif
                    @endif
                    <span class="type">{{ ucwords($mArticle->post_type) }}</span>
                    @if ($mArticle->post_type == 'article')
                    <a href="{{ route('dynamicArticle', $mArticle->slug) }}">
                        <p>{{ $mArticle->title }}</p>
                    </a>
                    @endif
                    @if ($mArticle->post_type == 'video')
                    <a href="{{ route('dynamicArticleVideo', $mArticle->slug) }}">
                        <p>{{ $mArticle->title }}</p>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function () {
        $('.saveFavourite').click(function (e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.ajax({
                type: 'POST',
                url: "{{ route('ajax.save.items') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (response) {
                    // console.log(response.responseText);
                    alert(response.message);
                },
                error: function (jqXHR, exception) {
                    // console.log(jqXHR);
                    // console.log(exception);
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 401) {
                        msg = 'Unauthorized: ' + jqXHR.responseJSON.message;
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500]. ' + jqXHR.responseJSON.message;
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error: ' + jqXHR.responseJSON.message;
                    }
                    alert(msg);
                }
            });
            // $('.section-search-'+id).remove();
        })
    })


// End
</script>
@endsection