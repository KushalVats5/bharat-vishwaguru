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
                    <h3>Article Details</h3>
                    <a href="{{route('tickets.create') }}" class="btn btn-success btn-sm">Add New Article</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                       @if ($tickets->isEmpty())
                        <p>There are currently no tickets.</p>
                    @else
                    <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        {{ $ticket->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('tickets.show', $ticket->ticket_id)}}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Open')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>
                                        @if($ticket->status === 'Open')
                                            <a href="{{ route('tickets.show', $ticket->ticket_id)}}" class="btn btn-primary">Comment</a>

                                            <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">Close</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection
