@extends('layouts.admin-auth')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">{{__('Services Details') }}</h5>
                        <div class="heading-elements">
                            <a class="btn btn-success btn-sm " href="{{route('service.create')}}">
                                <i class="fa fa-plus mr-2"></i> {{__('Add New services')}}
                            </a>
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif
                    @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif
                    @if (session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('danger') }}
                    </div>
                    @endif
                    <div class="clear-fix">&nbsp;</div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{route('service.edit',$row->id)}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('service.destroy',$row->id) }}"
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
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection