@extends('layouts.admin-auth')


@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">


                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Update Service</h5>
                    </div>

                    <hr />
                    <form action="{{ route('service.update', $article->id) }}" method="POST"
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
                            <div class="col-md-12">
                                <div class="form-group ml-3 ">
                                    <div class="author">
                                        @php
                                        $service_image = json_decode($article->service_image);
                                        @endphp
                                        <a href="#">
                                            <img src="{{$service_image->thumbnail}}" alt="{{$article->title}}"
                                                class="avatar border-gray" />
                                        </a>
                                    </div>
                                    <label class="form-label">Featured Image</label>
                                    <input type="file"
                                        class="form-control-file @error('service_image') is-invalid @enderror"
                                        name="service_image">
                                    @error('service_image')
                                    <label id="service_image-error" class="error"
                                        for="service_image">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Price Rs.</label>
                                    <input type="text" name="price" class="form-control" value="{{$article->price}}">
                                    @error('price')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
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