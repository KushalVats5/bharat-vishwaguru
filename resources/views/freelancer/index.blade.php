@extends('home')

@section('title')
	FreeLancer
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Freelancers</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                @foreach($freelancers as $row)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->mobile }}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{ route('freelancer.show.task', $row->id) }}" >
                                            <button class="btn btn-success btn-sm">show</button>
                                        </a>


                                        <!-- {{-- &nbsp;
                                        <a href="{{route('articles.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('articles.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form> --}} -->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     {{ $freelancers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
