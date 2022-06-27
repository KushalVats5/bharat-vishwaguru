@extends('layouts.client-auth')
{{-- @extends('site-layout') --}}
@section('content')
    <div class="content-box">
        <h3 class="mb-3">My saved item's</h3>
        <div class="more-from">
            <div class="row">
                @if (count($saveArticles) > 0)
                    @foreach ($saveArticles as $mArticle)
                        <div class="col-md-3 section-search-{{ $mArticle->id }}">
                            <div class="blog-box">
                                @if ($mArticle->post_type == 'video')
                                    @if (Storage::disk('public')->exists('uploads/videos/' . $mArticle->video_file))
                                        <video controls>
                                            <source src="{{ Storage::url('uploads/videos/' . $mArticle->video_file) }}"
                                                type="video/mp4">
                                        </video>
                                    @endif
                                @endif
                                @if ($mArticle->post_type == 'article')
                                    @if ($mArticle->article_image)
                                        @php
                                            $image = json_decode($mArticle->article_image);
                                            //dd($image);
                                        @endphp
                                        <a href="{{ route('dynamicArticle', $mArticle->slug) }}" target="_blank"
                                            class="avatar border-gray">
                                            <img src="{{ $image->thumbnail }}" alt="blog thumb" width=""
                                                height="">
                                        </a>
                                    @else
                                        <a href="{{ route('dynamicArticle', $mArticle->slug) }}" target="_blank"
                                            class="avatar border-gray">
                                            <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}"
                                                alt="blog thumb">
                                        </a>
                                    @endif
                                @endif
                                <div class="blog-content">
                                    <span class="type">{{ ucwords($mArticle->post_type) }}</span>
                                    <p>{{ $mArticle->title }}</p>
                                    <a href="{{ $mArticle->id }}" class="add removeFavourite">+</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1 class="text-center">No record found</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.removeFavourite').click(function(e) {
                e.preventDefault();
                var id = $(this).attr('href');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.remove.items') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        // console.log(response.responseText);
                        alert(response.message);
                        $('.section-search-' + id).remove();
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
    </script>
@endsection
