@extends('home')

@section('title')
	Article
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Income Tax Return Details</h3>
                    {{-- <a href="{{route('articles.create')}}" class="btn btn-success btn-sm">Add New Article</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Pancard</th>
                                    <th>Name on pancard</th>
                                    <th>Login Name <small>match that on subscription details</small> </th>
                                    <th>User Id <small>Unique</small></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($forms as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->pancard }}</td>
                                    <td>{{ $row->name }}</td>
                                    @php
                                        $user = App\User::find($row->user_id);
                                        //dd($user);
                                    @endphp
                                    <td>{{$user->name}}</td>
                                    <td>{{$row->user_id}}</td>
                                    <td>
                                        <div style="display:flex;">
                                        <a href="{{ route('insta.tax.return.show', $row->id) }}" title="show" class="dynamicModal">
                                            <button class="btn btn-success btn-sm">show</button>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('insta.tax.return.show2', $row->id) }}" title="show" class="dynamicModal">
                                            <button class="btn btn-primary btn-sm">Payment Status</button>
                                        </a>
                                        &nbsp;
                                        @if ($row->document != null)
                                        <a href="{{ route('insta.tax.return.download', $row->id) }}" class="btn btn-warning btn-sm">Document</a>
                                            
                                        @endif

                                        &nbsp;
                                        <a href="{{route('assign.to.freelancer.index', $row->id)}}" class="btn btn-primary btn-sm">Assign to freelancer</a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $forms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
