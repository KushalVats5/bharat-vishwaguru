@extends('home')

@section('title')
	OurTeam
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>OurTeam Details</h3>
                    <a href="{{route('ourteam.create')}}" class="btn btn-success btn-sm">Add New OurTeam</a>
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
                                @foreach($pages as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{!! $row->content !!}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{ route('ourteam.show', $row->id) }}" title="show" class="dynamicModal">
                                            <button class="btn btn-success btn-sm">show</button>
                                        </a>
                                        &nbsp;
                                        <a href="{{route('ourteam.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                        <form id="delete_form{{$row->id}}" method="POST" action="{{ route('ourteam.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
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
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
