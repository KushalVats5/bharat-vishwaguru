@extends('layouts.admin-auth')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <div class="">
                        <h3>Roles</h3>
                        <a href="{{route('role.create')}}" class="btn btn-success btn-sm">Add New</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        @foreach($row->permissions()->pluck('name') as $permission)
                                        {{ $permission }},
                                        @endforeach
                                    </td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{route('role.edit',$row->id)}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('role.destroy',$row->id) }}"
                                                onclick="return confirm('Are you sure?')">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection