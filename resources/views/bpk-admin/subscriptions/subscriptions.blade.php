@extends('home')

@section('title')
	Subscription Details
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                {{--<div class="">
                    <h3>Subscription Details</h3>
                    <a href="{{route('pages.create')}}" class="btn btn-success btn-sm">Add New page</a>
                </div>--}}
                <div class="card-body">
                     <h4>Showing {{ $UserPayment->firstItem() }} - {{ $UserPayment->lastItem() }}</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Order Id</th>
                                    <th>Plan Name</th>
                                    <th>Sub Plan Name</th>
                                    {{-- <th>Subscription Start</th>
                                    <th>Subscription End</th> --}}
                                    {{-- <th>UserName</th>
                                    <th>User Id <small>Specific</small></th> --}}
                                    <th>Payment Status</th>
                                    <th>Working Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($UserPayment as $row)

                                <tr>
                                    <td>{{ ($UserPayment->currentpage()-1) * $UserPayment->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $row->order_id }}</td>
                                    <td>{{ $row->user_plan_name }}</td>
                                    <td>{{ $row->user_plan_sub_name }}</td>
                                    {{-- <td>{{ $row->subscription_start }}</td>
                                    <td>{{ $row->subscription_end }}</td> --}}
                                    <td>{{ $row->order_status}}</td>

                                    @php
                                        if($row->user_plan_name == "instaEfilling"){
                                           $work ?? '' = App\InstaEfilling::find($row->user_plan_id);
                                        }

                                        if ($row->user_plan_name == 'Income Tax Return') {
                                            # code...
                                            $work ?? '' = App\IncomeTaxReturn::find($row->user_plan_id);
                                        }



                                    @endphp
                                    <th>{{$work ?? ''->status}} <small id="hide_data">(We will change status according to work.)</small> </th>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{ route('subscriptions.show', $work ?? ''->id) }}" title="show" class="dynamicModal">
                                            <button class="btn btn-success btn-sm">show</button>
                                        </a>
                                        &nbsp;

                                        @if ($row->user_plan_name == "instaEfilling" && $work ?? ''->work_done != null)
                                        <a href="{{ route('insta.document.download', $work ?? ''->id) }}">
                                            <button class="btn btn-warning btn-sm">Document</button>
                                        </a>
                                        @endif

                                        @if ($row->user_plan_name == 'Income Tax Return')

                                        @if ($work ?? ''->form1616a_done != null)
                                        <a href="{{ route('incometaxreturn.form1616a', $work ?? ''->id) }}">
                                            <button class="btn btn-warning btn-sm">form1616a</button>
                                        </a>

                                        @endif
                                        &nbsp;

                                        @if ($work ?? ''->other_document_done != null)
                                        <a href="{{ route('incometaxreturn.other.document', $row->id) }}">
                                            <button class="btn btn-warning btn-sm">Other document</button>
                                        </a>

                                        @endif
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $UserPayment->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-script')
<script>
    var workstatus = "{{$work ?? ''->status}}";

</script>

@endsection