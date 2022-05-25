@extends('layouts.admin-auth')


@section('content')

<style>
.ck-editor__editable {
    min-height: 300px !important;
}
</style>

<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Add Pages </h5>
                    </div>
                    <hr />
                    <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label font-weight-bold">Title</label>
                                    <input class="form-control" name="title" />
                                    @error('title')
                                    <label id="title-error" class="error" for="title">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Sub Heading')}}</label>
                                    <input name="sub_heading" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Meta Key')}}</label>
                                    <input type="text" name="meta_key" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('Short Description')}}</label>
                                    <textarea class="form-control" rows="2" name="short_description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('Meta Description')}}</label>
                                    <textarea class="form-control " rows="2" name="meta_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <textarea class="ckeditor form-control" name="content"></textarea>
                                    @error('content')
                                    <label id="content-error" class="invalid" for="content">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="form-label col-md-12">Featured Image</label>
                                <input type="file" class="form-control ml-3 @error('page_image') is-invalid @enderror"
                                    id="description" name="page_image">
                                @error('page_image')
                                <label id="page_image-error" class="error" for="page_image">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary  px-5">Submit</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->

</div>
@endsection