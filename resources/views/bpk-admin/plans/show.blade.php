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
                                Plans Details
                            </h3>
                            <div class="body">
                                Plan Title : {{$plan->title}}<br>
                                Plan description : {{$plan->description}}<br><br>
                                <h3>Features</h3>
                                @foreach ($features as $item)
                                {{$item->title}} - Rs {{$item->price}}<br>
                                    
                                @endforeach

                                <h3>Total Price</h3>
                                Rs - {{$plan->total_cost}}


                            </div>
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
