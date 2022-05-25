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
                        <form class="form-horizontal" role="form" method="POST" action="{{route('tickets.store')}}">
                            {!! csrf_field() !!}
    
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Title</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
    
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Category</label>
    
                                <div class="col-md-6">
                                    <select id="category" type="category" class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
    
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                                <label for="priority" class="col-md-4 control-label">Priority</label>
    
                                <div class="col-md-6">
                                    <select id="priority" type="" class="form-control" name="priority">
                                        <option value="">Select Priority</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
    
                                    @if ($errors->has('priority'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('priority') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-4 control-label">Message</label>
    
                                <div class="col-md-6">
                                    <textarea rows="10" id="message" class="form-control" name="message"></textarea>
    
                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-ticket"></i> Open Ticket
                                    </button>
                                </div>
                            </div>
                        </form>
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
