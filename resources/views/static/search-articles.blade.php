@extends('layouts.client-auth')
{{-- @extends('site-layout') --}}
@section('content')
    <div class="content-box">
        <h3 class="mb-3">Search result for "{{ request()->s }}" {{ $articles->count() }} result found</h3>
        <div class="more-from">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-3 section-search-{{ $article->id }}">
                        <div class="blog-box">
                            @if ($article->post_type == 'video')
                                @if (Storage::disk('public')->exists('uploads/videos/' . $article->video_file))
                                    <video controls>
                                        <source src="{{ Storage::url('uploads/videos/' . $article->video_file) }}"
                                            type="video/mp4">
                                    </video>
                                @endif
                            @endif
                            @if ($article->post_type == 'article')
                                @if ($article->article_image)
                                    @php
                                        $image = json_decode($article->article_image);
                                        //dd($image);
                                    @endphp
                                    <a href="{{ route('dynamicArticle', $article->slug) }}" target="_blank"
                                        class="avatar border-gray">
                                        <img src="{{ $image->thumbnail }}" alt="blog thumb" width="" height="">
                                    </a>
                                @else
                                    <a href="{{ route('dynamicArticle', $article->slug) }}" target="_blank"
                                        class="avatar border-gray">
                                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog thumb">
                                    </a>
                                @endif
                            @endif
                            <div class="blog-content">
                                <span class="type">{{ ucwords($article->post_type) }}</span>
                                @if ($article->post_type == 'article')
                                    <a href="{{ route('dynamicArticle', $article->slug) }}">
                                        <p>{{ $article->title }}</p>
                                    </a>
                                @endif
                                @if ($article->post_type == 'video')
                                    <a href="{{ route('dynamicArticleVideo', $article->slug) }}">
                                        <p>{{ $article->title }}</p>
                                    </a>
                                @endif
                                {{-- <a href="{{$article->id}}" class="add removeFavourite">+</a> --}}
                                <a href="{{ $article->id }}" class="saveFavourite">
                                    <svg width="24" height="24" viewBox="0 0 29 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1" y="1" width="27" height="27" rx="2"
                                            stroke="#CACEE5" stroke-width="2" />
                                        <line x1="14.5938" y1="7.34375" x2="14.5938" y2="21.6562" stroke="#CACEE5"
                                            stroke-width="2" stroke-linecap="round" />
                                        <line x1="21.6562" y1="14.5938" x2="7.34375" y2="14.5938" stroke="#CACEE5"
                                            stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.saveFavourite').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('href');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.save.items') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        // console.log(response.responseText);
                        alert(response.message);
                    },
                    error: function(jqXHR, exception) {
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
                            msg = 'Internal Server Error [500]. '+jqXHR.responseJSON.message;
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
    </script>
@endsection
