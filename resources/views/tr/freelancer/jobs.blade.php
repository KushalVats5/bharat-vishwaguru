@extends('layouts.freelancer-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Jobs') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th>Title</th>
                                    <th width="10%">Price Type</th>
                                    <th width="17%">Date</th>
                                    <th width="12%">Status</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($jobs as $job )
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->price_type }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($job->created_at))  }}</td>
                                    <td>{{ ucfirst($job->status) }}</td>
                                    <td>
                                        <a href="{{ route('tr/freelancer/job/view',['id'=>$job->id]) }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{$jobs->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection