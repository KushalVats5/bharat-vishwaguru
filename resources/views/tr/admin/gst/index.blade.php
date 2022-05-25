@extends('layouts.admin-auth')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">


                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">All GST</h5>
                        <div class="heading-elements">
                            <a class="btn btn-success btn-sm" href="#">
                                <i class="fa fa-plus mr-2"></i> {{__('Add New')}}
                            </a>
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>GST No</th>
                                    <th>Firm Name</th>
                                    <th>Owner Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gst_infos as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->gst_no }}</td>
                                    <td>{{ $row->firm_name }}</td>
                                    <td>{{ $row->owner_name }}</td>
                                    <td>{{ $row->email_id }}</td>
                                    <td>{{ $row->phone_no }}</td>
                                    <td>
                                        <div style="display:flex;">

                                            <a href="{{route('tr/admin/gst/edit',['id'=>$row->id])}}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            <form id="delete_form{{$row->id}}" method="POST"
                                                action="{{ route('tr/admin/gst/edit',$row->id) }}"
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
                        {{ $gst_infos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection