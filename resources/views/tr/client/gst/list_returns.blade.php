@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="card-body">


                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">All GST Returns</h5>
                        <div class="heading-elements">
                            {{--<a class="btn btn-success btn-sm" href="{{route('tr/user/gst-return-file/add')}}">
                            <i class="fa fa-plus mr-2"></i> {{__('Add New')}}
                            </a>--}}
                        </div>
                    </div>
                    <div class="clear-fix">&nbsp;</div>
                    <div class="table-responsive">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Job Id</th>
                                    <th>GST No</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Is Nill</th>
                                    <th>Sales</th>
                                    <th>Purchase</th>
                                    <th>S/P Json</th>
                                    <th>GSTR1</th>
                                    <th>GSTR3B</th>
                                    <th>Tax Computation</th>
                                    <th>GST Challan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($returns as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->jobs->id??'n/a' }}</td>
                                    <td>{{ $row->gst_info->gst_no }}</td>
                                    <td>{{ $row->month }}</td>
                                    <td>{{ $row->financial_year }}</td>
                                    <td>{{ $row->is_file_nill?'Yes':'No' }}</td>
                                    <td>{{-- $row->sales_bills --}} <a href="#">Download</a></td>
                                    <td>{{-- $row->purchase_bills --}}<a href="#">Download</a></td>
                                    <td>{{-- $row->json_bills --}}<a href="#">Download</a></td>
                                    <td>{{ $row->gstr1_doc }}</td>
                                    <td>{{ $row->gstr3b_doc }}</td>
                                    <td>{{ $row->tax_computation_doc }}</td>
                                    <td>{{ $row->gst_challan_doc }}</td>
                                    <td>{{ $row->jobs->status??'n/a' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $returns->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection