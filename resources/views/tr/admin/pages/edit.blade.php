@extends('layouts.admin-auth')

@section('content')
<style>
.ck-editor__editable {
    min-height: 300px !important;
}
</style>
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Page</h5>
                    </div>

                    <hr />
                    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label font-weight-bold">Title</label>
                                    <input class="form-control" name="title" value="{{ $page->title }} " />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Sub Heading')}}</label>
                                    <input name="sub_heading" class="form-control" value="{{ $page->sub_heading }} " />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Meta Key')}}</label>
                                    <input type="text" name="meta_key" class="form-control"
                                        value="{{ $page->meta_key }} " />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('Short Description')}}</label>
                                    <textarea class="form-control" rows="2"
                                        name="short_description">{{ $page->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('Meta Description')}}</label>
                                    <textarea class="form-control" rows="2"
                                        name="meta_description">{{ $page->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <textarea class="ckeditor form-control" name="content">{{$page->content}}</textarea>
                                </div>
                            </div>

                            <div class="form-group ml-3 ">
                                <div class="author">
                                    @if ($page->page_image)
                                    @php
                                    $image = json_decode($page->page_image);
                                    //dd($image);
                                    @endphp
                                    <a href="javascript;" class="avatar border-gray">
                                        <img src="{{ $image->thumbnails }}" alt="blog thumb" width="150" height="">
                                    </a>

                                    @else
                                    <a href="javascript;" class="avatar border-gray">
                                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}" alt="blog thumb">
                                    </a>
                                    @endif
                                </div>
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                    name="featured_image">
                                @error('featured_image')
                                <label id="featured_image-error" class="error"
                                    for="featured_image">{{ $message }}</label>
                                @enderror
                            </div>


                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->

</div>
@endsection