@extends('home')

@section('title')
    Edit Article
@endsection

@section('extra-css')
@endsection

@section('index')
        <div class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        {{-- <div class="">
                            <h3>
                                Edit Article Details
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('articles.update',$article->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group ">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$article->title}}" placeholder="articletitle" required autofocus>
                                    @error('title')
                                        <label id="title-error" class="error" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control @error('post_content') is-invalid @enderror" name="post_content" placeholder="post_content Id" required autofocus>{{$article->post_content}}</textarea>
                                    @error('post_content')
                                        <label id="post_content-error" class="error" for="post_content">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label class="form-label">Excerpt</label>
                                    <textarea class="form-control @error('post_excerpt') is-invalid @enderror" name="post_excerpt" placeholder="post_excerpt Id" required autofocus>{{$article->post_excerpt}}</textarea>
                                    @error('post_excerpt')
                                        <label id="post_excerpt-error" class="error" for="post_excerpt">{{ $message }}</label>
                                    @enderror
                                </div>   
                                <div class="form-group ">
                                    <div class="author">
                                    <a href="#">
                                    <img src="{{url('storage/featured-image')}}/{{$article->featured_image}}" alt="{{$article->title}}" class="avatar border-gray"/>
                                    </a>
                                    </div>
                                    <label class="form-label">Featured Image</label>
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image">
                                    @error('featured_image')
                                        <label id="featured_image-error" class="error" for="featured_image">{{ $message }}</label>
                                    @enderror
                                </div>                            
                                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                            </form>
                        </div> --}}

                        <div class="d-flex justify-content-between">
                            <h5 class="page-title">Article <small>( {{__('All article goes here')}} ) </small></h5>
                            <div class="heading-elements">
                                <a class="btn btn-danger btn-sm px-5" href="{{route('articles.index') }}">
                                    <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                                </a>
                            </div>
                        </div>
                    
                        <hr />
                        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <input  name="sub_heading" class="form-control" value="{{ $article->sub_heading }} "/>
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('Meta Key')}}</label>
                                        <input type="text" name="meta_key" class="form-control" value="{{ $article->meta_key }} "/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Short Description')}}</label>
                                        <textarea class="form-control" rows="2" name="short_description">{{ $article->short_description }}</textarea>
                                    </div>
                                </div>           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('Meta Description')}}</label>
                                        <textarea class="form-control" rows="2" name="meta_description">{{ $article->meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <textarea class="ckeditor form-control" name="content" >{{$article->content}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group ml-3 ">
                                    <div class="author">
                                    <a href="#">
                                    <img src="{{url('storage/featured-image')}}/{{$article->featured_image}}" alt="{{$article->title}}" class="avatar border-gray"/>
                                    </a>
                                    </div>
                                    <label class="form-label">Featured Image</label>
                                    <input type="file" class="form-control @error('article_image') is-invalid @enderror" name="article_image">
                                    @error('article_image')
                                        <label id="article_image-error" class="error" for="article_image">{{ $message }}</label>
                                    @enderror
                                </div> 

                                <div class="form-group ml-5">
                                    <label class="form-label">Categories (Multiple Selection)</label>
                                    <select class="form-control selectpicker w-100 @error('permission') is-invalid @enderror" name="permission[]" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm" required>
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
            <!-- #END# Vertical Layout -->

        </div>
@endsection

@section('extra-script')
<script type="text/javascript">
    
</script>

@endsection
