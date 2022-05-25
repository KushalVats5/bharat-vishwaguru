@extends('home')

@section('title')
    Edit Article
@endsection

@section('extra-css')
@endsection

@section('index')
        <div class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="d-flex justify-content-between">
                            <h5 class="page-title">Income Tax Return  <small>( {{__('Income tax Return')}} ) </small></h5>
                            <div class="heading-elements">
                                <a class="btn btn-danger btn-sm px-5" href="{{route('income.tax.return.list') }}">
                                    <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                                </a>
                            </div>
                        </div>
                    
                        <hr />
                    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Title</label>
                                        <input class="form-control" name="title" value="{{ $article->title }} " />
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('Sub Heading')}}</label>
                                        <input  name="sub_heading" class="form-control" value="{{ $article->sub_heading }} "/>
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('Meta Key')}}</label>
                                        <input type="text" name="meta_key" class="form-control" value="{{ $article->meta_key }} "/>
                                    </div>
                                </div>
                            </div>
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
