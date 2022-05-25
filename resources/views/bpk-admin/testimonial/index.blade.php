@extends('home')

@section('title')
	Testimonial
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Testimonial Details</h3>
                    <a href="{{route('testimonial.create')}}" class="btn btn-success btn-sm">Add New Testimonial</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonial as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->short_description }}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{ route('testimonial.show', $row->id) }}" title="show" class="dynamicModal">
                                            <button class="btn btn-success btn-sm">show</button>
                                        </a>
                                        &nbsp;
                                        <a href="{{route('testimonial.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('testimonial.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
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
                        {{ $testimonial->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
