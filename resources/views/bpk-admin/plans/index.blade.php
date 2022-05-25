@extends('home')

@section('title')
	Plan
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Plans Details</h3>
                    <a href="{{route('plans.create')}}" class="btn btn-success btn-sm">Add New Plan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plans as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{route('plans.edit',$row->slug)}}" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                        <a href="{{route('plans.show' ,$row->slug)}}" class="btn btn-primary btn-sm">Show</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('plans.destroy',$row->slug) }}" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $plans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
