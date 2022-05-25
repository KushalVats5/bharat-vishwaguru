@extends('layouts.admin-auth')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('errors.custom-message')
            <div class="card">

                <div class="card-body">


                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">All Videos</h5>
                        <div class="heading-elements">
                            <a class="btn btn-success btn-sm" href="{{route('video.create')}}">
                                <i class="fa fa-plus mr-2"></i> {{__('Add New Video')}}
                            </a>
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
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
                                @foreach($articles as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->short_description }}</td>
                                    <td>
                                        <div style="display:flex;">

                                            <a href="{{route('video.edit',$row->id)}}"
                                                class="btn btn-warning btn-sm" title="Edit"><i class="far fa-edit"></i></a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('video.destroy',$row->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection