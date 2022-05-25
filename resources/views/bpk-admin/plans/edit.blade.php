@extends('home')

@section('title')
Edit Plans
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
                        Edit Plans Details
                    </h3>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" action="{{ route('plans.update',$plans->slug) }}">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group" id="fortest">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" placeholder = "Title" value = "{{$plans->title}}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <label id="title-error" class="error" for="title">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                placeholder="{{$plans->description}}" required
                                autofocus>{{$plans->description}}</textarea>
                            @error('description')
                            <label id="description-error" class="error" for="description">{{ $message }}</label>
                            @enderror
                        </div>

                        
                        <div class="form-group ">
                            <label class="form-label">Features</label><br>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($features as $item)
                            @if(in_array($item->id, $havefeatures->toArray()))
                                @php $totalPrice += $item->price; @endphp
                            @endif
                            <p class="pl-check">
                                <input type="checkbox" name="features[]" value="{{$item->id}}" data-price="{{$item->price}}" {{in_array($item->id, $havefeatures->toArray()) ? 'checked' : ''}}>
                                <label for="">{{$item->title}}&nbsp;&nbsp; <strong>(Rs. {{$item->price}})</strong></label>
                            </p>
                           

                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group ">
                            
                                <label><strong>Total Cost:</strong> <input type="text" name="total_cost" class="total-cost form-control" value="{{$plans->price}}"/></label>
                            </div>
                        
                        <input type="hidden" value="{{$plans->id}}" name="hidden">
                        <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->

</div>

<script>
//   var el = document.getElementById('beautyProducts');
//   var products = el.getElementsByTagName('input');
//   var len = products.length;
//   console.log("this is for practice");
//   console.log(el);
//   console.log(products);
//   console.log(len);

  

//   for (var i = 0; i < len; i++) {
//     if (products[i].type === "checkbox") {
//       products[i] = console.log('working');
      
//     }
//   }


</script>
@endsection

@section('extra-script')
<script type="text/javascript">
$(document).ready(function(){
        var totalPrice = '{{$totalPrice}}';
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