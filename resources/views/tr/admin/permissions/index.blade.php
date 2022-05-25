@extends('layouts.admin-auth')


@section('content')
<div class="content">
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card card-stats">

                <div class="card-body">
                    <div class="">
                        <h3>Permission</h3>
                        <a href="{{route('permission.create')}}" class="btn btn-success btn-sm">Add New</a>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{route('permission.edit',$row->id)}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('permission.destroy',$row->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->

</div>
@endsection