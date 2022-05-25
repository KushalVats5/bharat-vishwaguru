@extends('home')

@section('title')
    Add Ticket
@endsection

@section('extra-css')
@endsection

@section('index')
        <div class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="d-flex justify-content-between">
                            <h5 class="page-title">Ticket <small>( {{__('All Tickets goes here')}} ) </small></h5>
                            <div class="heading-elements">
                                <a class="btn btn-danger btn-sm px-5" href="{{route('tickets.index') }}">
                                    <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                                </a>
                            </div>
                        </div>
            
                        <hr />
                        <div class="ticket-info">
                            <p>{{ $ticket->message }}</p>
                            <p>Category: {{ $ticket->category->name }}</p>
                            <p>
                                @if ($ticket->status === 'Open')
                                    Status: <span class="label label-success">{{ $ticket->status }}</span>
                                @else
                                    Status: <span class="label label-danger">{{ $ticket->status }}</span>
                                @endif
                            </p>
                            <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                        </div>
                        <hr>
    
                        @include('tickets.comments')
            
                        <hr>
            
                        @include('tickets.reply')
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
@endsection

@section('extra-script')
<script type="text/javascript">
    
</script>

@endsection
