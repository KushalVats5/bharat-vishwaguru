@extends('home')

@section('title')
	Article
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Freelancres Details</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-6 form-control p-5">
                        <h6><strong>Name = {{$freelancer->name}}</strong> </h6>
                        <h6> <strong>Phone = {{$freelancer->mobile}}</strong> </h6>
                       <h6> <strong> Email = {{$freelancer->email}} </strong></h6>

                       <h5 class="mt-4"> <strong>Assigned Subscriber</strong> </h5>
                       <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($subscribers_to_freelancer as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->mobile }}</td>
                                {{-- <td>
                                    <div style="display:flex;">
                                    <a href="#" >
                                        <button id="hidebutton" onclick="hide({{$freelancer->id}}, {{$row->id}})" class="btn btn-success btn-sm">assign</button>
                                    </a>
                                    &nbsp;
                                    <a href="{{route('articles.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                    <form id="delete_form{{$row->id}}" method="POST" action="{{ route('articles.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    </div>

                    <div class="col-md-6 form-control">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> {{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->mobile }}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="#" >
                                            <button id="hidebutton" onclick="hide({{$freelancer->id}}, {{$row->id}})" class="btn btn-success btn-sm">assign</button>
                                        </a>
                                        {{-- &nbsp;
                                        <a href="{{route('articles.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('articles.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>


</div>
@endsection
<script>
    function hide(freelancer = null, subscriber = null){
        alert(" Assigned Subscriber to Freelancer");
        console.log(freelancer, subscriber);
        document.getElementById('hidebutton').style.display = "none";

        $.ajax({
            url: "{{ route('freelancer.assign') }}",
            method: "POST",
            data: {'_token':"{{csrf_token()}}", "freelancer_id":freelancer, "user_id":subscriber},
            success: function(response) {
                console.log(response);

            }
        });


    }

</script>
@section('extra-script')


@endsection
