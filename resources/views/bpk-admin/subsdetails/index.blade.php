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
                    <div class="">
                    <h3>Subscription Details</h3>
                    <a href="
                        {{ route('pages.create') }}" class="btn btn-success btn-sm">Add New page</a>
                    </div>
                    <div class="card-body">
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
                                        <th>UserName</th>
                                        <th>User Id <small>Unique</small></th>
                                        <th>Order Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subs as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->order_id }}</td>
                                            <td>{{ $row->user_plan_name }}</td>
                                            <td>{{ $row->user_plan_sub_name }}</td>
                                            {{-- <td>{{ $row->subscription_start }}</td>
                                    <td>{{ $row->subscription_end }}</td> --}}
                                            @php
                                                // dd($row->id);
                                                $user = App\User::find($row->user_id);
                                                // dd($user);
                                            @endphp
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $row->user_id }}</td>
                                            <td>{{ $row->order_status }}</td>
                                            <td>
                                                <div style="display:flex;">
                                                    <a href="{{ route('subscription.details.show', $row->id) }}"
                                                        title="show" class="dynamicModal">
                                                        <button class="btn btn-success btn-sm">show</button>
                                                    </a>
                                                    &nbsp;
                                                    {{-- <form id="delete_form{{$row->id}}" method="POST" action="{{ route('pages.destroy',$row->id) }}" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $subs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-script')

@endsection
