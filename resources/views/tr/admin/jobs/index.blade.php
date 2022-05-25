@extends('layouts.admin-auth')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">


                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">All Jobs</h5>
                        <div class="heading-elements">
                            {{--<a class="btn btn-success btn-sm" href="#">
                                <i class="fa fa-plus mr-2"></i> {{__('Add New')}}
                            </a>--}}
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>Status</th>
                                    <th>Assigned To</th>
                                    <th>Assigned By</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->owner->name }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->freelancer->name??'n/a' }}</td>
                                    <td>{{ $row->assigner->name??'n/a' }}</td>
                                    <td>Rs.{{ $row->price }} ({{ $row->price_type }})</td>

                                    <td>
                                        <div style="display:flex;">

                                            <a href="{{route('tr/admin/job/view',['id'=>$row->id])}}" title="view"><i
                                                    class="fas fa-eye"></i></a>
                                            &nbsp;
                                            {{--<form id="delete_form{{$row->id}}" method="POST"
                                            action="{{ route('tr/admin/gst/edit',$row->id) }}"
                                            onclick="return confirm('Are you sure?')">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>--}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection