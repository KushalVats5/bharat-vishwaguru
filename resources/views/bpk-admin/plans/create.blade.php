@extends('home')

@section('title')
    Add Plans
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
                                Add plan Details
                            </h3>
                        </div>
                        <div class="body">
                           <form id="form_validation" method="POST" action="{{ route('plans.store') }}" >
                            @csrf
                            <input name="_method" type="hidden" value="POST">
                            <div class="form-group ">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" placeholder="Title" required autofocus>
                                    @error('title')
                                        <label id="title-error" class="error" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" required autofocus>{{old('description')}}</textarea>
                                    @error('description')
                                        <label id="description-error" class="error" for="description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Features</label><br>
                                    @foreach ($features as $item)
                                    <p class="pl-check">
                                        <input type="checkbox" name="features[]" value="{{$item->id}}" data-price="{{$item->price}}" >
                                        <label for="">{{$item->title}}&nbsp;&nbsp; <strong>(Rs. {{$item->price}})</strong></label>
                                    </p>
        
                                    @endforeach
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group ">
                            
                                    <label><strong>Total Cost:</strong> <input type="text" name="total_cost" class="total-cost form-control" value="0.00"/></label>
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
    $(document).ready(function(){
        var totalPrice = 0;
        $('input[name="features[]"]').click(function(){
            if($(this).is(":checked")){
                totalPrice += parseInt($(this).attr("data-price"));
            }
            else if($(this).is(":not(:checked)")){
                totalPrice -= parseInt($(this).attr("data-price"));
            }
            $('.total-cost').val(totalPrice);
        });
    });
</script>

@endsection
