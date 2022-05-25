@extends('home')

@section('title')
	Ticket
@endsection

@section('extra-css')
@endsection

@section('index')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="">
                    <h3>Ticket Details</h3>
                    <a href="{{route('tickets.create') }}" class="btn btn-success btn-sm">Add New Ticket</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($tickets->isEmpty())
                        <p>You have not created any tickets.</p>
                    @else
                    <table class="table table-bordered" id="dt-mant-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td>
                                            {{ $ticket->category->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('tickets.show', $ticket->ticket_id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($ticket->status == "Open")
                                                <span class="label label-success">{{ $ticket->status }}</span>
                                            @else
                                                <span class="label label-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $ticket->updated_at }}
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
