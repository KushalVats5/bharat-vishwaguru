@extends('home')

@section('title')
    Add Article
@endsection

@section('extra-css')
@endsection

@section('index')
        <div class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="d-flex justify-content-between">
                            <h5 class="page-title">Categories <small>( {{__('All categories goes here')}} ) </small></h5>
                            <div class="heading-elements">
                                <a class="btn btn-danger btn-sm px-5" href="{{route('categories.index') }}">
                                    <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                                </a>
                            </div>
                        </div>
            
                        <hr />
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
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
                                </div><br>
            
                                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">

                                    <label>Category:</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                        <option value="0">Select</option>
                                        @foreach($allCategories as $rows)
                                                <option value="{{ $rows->id }}">{{ $rows->title }}</option>
                                        @endforeach
                                    </select>
            
                                    @if ($errors->has('parent_id'))
                                        <span class="text-red" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span>
                                    @endif
            
                                </div>
            
                                <div class="form-group ">
                                    <label class="form-label col-md-12">Featured Image</label>
                                    <input type="file" class="form-control ml-3 @error('category_image') is-invalid @enderror" id="description"
                                        name="category_image">
                                    @error('category_image')
                                    <label id="category_image-error" class="error" for="category_image">{{ $message }}</label>
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
<script type="text/javascript">
    
</script>

@endsection
