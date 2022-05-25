@extends('layouts.admin-auth')

@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Article <small>( {{__('All article goes here')}} ) </small></h5>
                        <div class="heading-elements">
                            <a class="btn btn-danger btn-sm px-5" href="{{route('article.index') }}">
                                <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                            </a>
                        </div>
                    </div>

                    <hr />
                    <form action="{{ route('articles.update', $article->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label font-weight-bold">Title</label>
                                    <input class="form-control" name="title" value="{{ $article->title }} " />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Sub Heading')}}</label>
                                    <input name="sub_heading" class="form-control"
                                        value="{{ $article->sub_heading }} " />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Meta Key')}}</label>
                                    <input type="text" name="meta_key" class="form-control"
                                        value="{{ $article->meta_key }} " />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('Short Description')}}</label>
                                    <textarea class="form-control" rows="2"
                                        name="short_description">{{ $article->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('Meta Description')}}</label>
                                    <textarea class="form-control" rows="2"
                                        name="meta_description">{{ $article->meta_description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <textarea class="ckeditor form-control"
                                        name="content">{{$article->content}}</textarea>
                                </div>
                            </div>

                            <div class="form-group ml-3 ">
                                <div class="author">
                                    <a href="#">
                                        <img src="{{url('storage/featured-image')}}/{{$article->featured_image}}"
                                            alt="{{$article->title}}" class="avatar border-gray" />
                                    </a>
                                </div>
                                <label class="form-label">Featured Image</label>
                                <input type="file" class="form-control @error('article_image') is-invalid @enderror"
                                    name="article_image">
                                @error('article_image')
                                <label id="article_image-error" class="error" for="article_image">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group ml-5">
                                <label class="form-label">Categories (Multiple Selection)</label>
                                <select
                                    class="form-control selectpicker w-100 @error('permission') is-invalid @enderror"
                                    name="permission[]" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm"
                                    required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('permission')
                                <label id="name-error" class="error" for="email">{{ $message }}</label>
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