@extends('home')

@section('title')
    Edit OurTeam
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
                    
                         <div class="d-flex justify-content-between">
                            <h5 class="page-title">OurTeam <small>( {{__('All page goes here')}} ) </small></h5>
                            <div class="heading-elements">
                                <a class="btn btn-danger btn-sm px-5" href="{{route('ourteam.index') }}">
                                    <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                                </a>
                            </div>
                        </div>
                    
                        <hr />
                        <form action="{{ route('ourteam.update', $page->id) }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                             @method('PUT')
                    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Name</label>
                                        <input class="form-control" name="name" value="{{ $page->name }} " />
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('Designation')}}</label>
                                        <input  name="sub_heading" class="form-control" value="{{ $page->sub_heading }} "/>
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
                                    <a href="#">
                                    <img src="{{url('storage/featured-image')}}/{{$page->featured_image}}" alt="{{$page->title}}" class="avatar border-gray"/>
                                    </a>
                                    </div>
                                    <label class="form-label">Featured Image</label>
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image">
                                    @error('featured_image')
                                        <label id="featured_image-error" class="error" for="featured_image">{{ $message }}</label>
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
