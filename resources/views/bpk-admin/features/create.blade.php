@extends('home')

@section('title')
    Add Features
@endsection

@section('extra-css')
@endsection

@section('index')
        <div class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h3>
                                Add Features Details
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('features.store') }}" >
                            @csrf
                            <input name="_method" type="hidden" value="POST">
                            <div class="form-group ">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" placeholder="Title" >
                                    @error('title')
                                        <label id="title-error" class="error" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Price</label>
                                    <textarea class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Feature Price" required autofocus>{{old('price')}}</textarea>
                                    @error('price')
                                        <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                                                          
                                <button class="btn btn-primary btn-sm" type="submit">Create</button>
                            </form>
                        </div>
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
