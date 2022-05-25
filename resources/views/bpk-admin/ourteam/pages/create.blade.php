@extends('home')

@section('title')
Add Page
@endsection

@section('extra-css')
@endsection

@section('index')

<style>
    .ck-editor__editable {
        min-height: 300px !important;
    }
</style>

<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                {{-- <div class="">
                            <h3>
                                Add Page Details
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('pages.store') }}"
                enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="POST">
                <div class="form-group ">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{old('title')}}" placeholder="Title" required autofocus>
                    @error('title')
                    <label id="title-error" class="error" for="title">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group ">
                    <label class="form-label">Content</label>
                    <textarea class="form-control @error('post_content') is-invalid @enderror" name="post_content"
                        placeholder="Content" required autofocus>{{old('post_content')}}</textarea>
                    @error('post_content')
                    <label id="post_content-error" class="error" for="post_content">{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group ">
                    <label class="form-label">Excerpt</label>
                    <textarea class="form-control @error('post_excerpt') is-invalid @enderror" name="post_excerpt"
                        placeholder="Excerpt" required autofocus>{{old('post_excerpt')}}</textarea>
                    @error('post_excerpt')
                    <label id="post_excerpt-error" class="error" for="post_excerpt">{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group ">
                    <label class="form-label">Featured Image</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="featured_image">
                    @error('avatar')
                    <label id="avatar-error" class="error" for="avatar">{{ $message }}</label>
                    @enderror
                </div>
                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                </form>
            </div> --}}

            <div class="d-flex justify-content-between">
                <h5 class="page-title">Pages <small>( {{__('All page goes here')}} ) </small></h5>
                <div class="heading-elements">
                    <a class="btn btn-danger btn-sm px-5" href="{{route('pages.index') }}">
                        <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                    </a>
                </div>
            </div>

            <hr />
            <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Title</label>
                            <input class="form-control" name="title" />
                            @error('title')
                            <label id="title-error" class="error" for="title">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__('Sub Heading')}}</label>
                            <input name="sub_heading" class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__('Meta Key')}}</label>
                            <input type="text" name="meta_key" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('Short Description')}}</label>
                            <textarea class="form-control" rows="2" name="short_description"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('Meta Description')}}</label>
                            <textarea class="form-control " rows="2" name="meta_description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{__('Content')}}</label>
                            <textarea class="ckeditor form-control" name="content"></textarea>
                            @error('content')
                            <label id="content-error" class="error" for="content">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="form-label col-md-12">Featured Image</label>
                        <input type="file" class="form-control ml-3 @error('page_image') is-invalid @enderror" id="description"
                            name="page_image">
                        @error('page_image')
                        <label id="page_image-error" class="error" for="page_image">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary  px-5">Submit</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
<!-- #END# Vertical Layout -->

</div>
@endsection

@section('extra-script')


@endsection