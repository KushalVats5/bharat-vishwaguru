@extends('home')

@section('title')
	Features
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Features Details</h3>
                    <a href="{{route('features.create')}}" class="btn btn-success btn-sm">Add New Feature</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>Rs-{{ $row->price }}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{route('features.edit',$row->slug)}}" class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('features.destroy',$row->slug) }}" onclick="return confirm('Are you sure?')">
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
                        {{ $features->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
