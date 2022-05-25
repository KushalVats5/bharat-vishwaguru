@extends('home')

@section('title')
    Edit Features
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
                                Edit Article Details
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('features.update',$features->slug) }}" ">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group ">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$features->title}}" placeholder="articletitle" required autofocus>
                                    @error('title')
                                        <label id="title-error" class="error" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">price</label>
                                    <textarea class="form-control @error('price') is-invalid @enderror" name="price" placeholder="price Id" required autofocus>{{$features->price}}</textarea>
                                    @error('price')
                                        <label id="price-error" class="error" for="price">{{ $message }}</label>
                                    @enderror
                                </div>
                                <input type="hidden" value="{{$features->id}}" name="hidden">              
                                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
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
