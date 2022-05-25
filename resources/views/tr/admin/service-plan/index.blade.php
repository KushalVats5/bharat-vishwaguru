@extends('layouts.admin-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center11">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Service Plans') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($records as $record )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $record->title }}</td>
                                    <td>{{ $record->description }}</td>
                                    <td>{{ $record->duration }} {{ $record->duration_unit }}</td>
                                    <td>Rs.{{ $record->price }}</td>
                                    <td>{{ $record->service_type }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td>
                                        <a href="{{ route('tr/admin/service-plan/edit',['id'=> $record->id]) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{ route('tr/admin/service-plan/edit',['id'=> $record->id]) }}">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{$records->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection