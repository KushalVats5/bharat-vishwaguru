@extends('layouts.admin-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center11">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Service Plan') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('tr/admin/service-plan/save') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="hidden" name="id" value="{{ $record->id ?? '' }}">
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        placeholder="Add title." value="{{ $record->title ?? '' }}">
                                    <small class="form-text text-muted">Add title.</small>
                                    @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control @error('title') is-invalid @enderror">{{ $record->title ?? '' }}</textarea>
                                    <small class="form-text text-muted">Add description.</small>
                                    @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration"
                                        class="form-control @error('duration') is-invalid @enderror" id="duration"
                                        placeholder="Add Duration." value="{{ $record->duration ?? '' }}">
                                    <small class="form-text text-muted">Add Duration.</small>
                                    @error('duration')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="duration_unit">Duration Unit</label>
                                    <select name="duration_unit"
                                        class="form-control @error('duration_unit') is-invalid @enderror"
                                        id="duration_unit">
                                        <option value="once" @if(isset($record->duration_unit) and
                                            $record->duration_unit=='once' ) selected="selected" @endif>Once</option>
                                        <option value="month(s)" @if(isset($record->duration_unit) and
                                            $record->duration_unit=='month(s)' ) selected="selected" @endif>Month(s)
                                        </option>
                                        <option value="year(s)" @if(isset($record->duration_unit) and
                                            $record->duration_unit=='year(s)' ) selected="selected" @endif>Year(s)
                                        </option>
                                    </select>
                                    <small class="form-text text-muted">Add Duration Unit.</small>
                                    @error('duration_unit')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price(Rs.)</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        placeholder="Add Price." value="{{ $record->price ?? '' }}">
                                    <small class="form-text text-muted">Add Price.</small>
                                    @error('price')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_type">Service Type</label>
                                    <select name="service_type"
                                        class="form-control @error('service_type') is-invalid @enderror"
                                        id="service_type">
                                        <option value="">-Select-</option>
                                        <option value="gst registration" @if(isset($record->service_type) and
                                            $record->service_type=='gst registration' ) selected="selected" @endif>
                                            GST Registration
                                        </option>
                                        <option value="gst return file" @if(isset($record->service_type) and
                                            $record->service_type=='gst return file' ) selected="selected" @endif>
                                            GST Return File
                                        </option>
                                        <option value="itr file" @if(isset($record->service_type) and
                                            $record->service_type=='itr file' ) selected="selected" @endif>
                                            ITR File
                                        </option>
                                        <option value="other" @if(isset($record->service_type) and
                                            $record->service_type=='other' ) selected="selected" @endif>
                                            Other
                                        </option>
                                    </select>
                                    <small class="form-text text-muted">Add Service Type.</small>
                                    @error('service_type')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                                        id="status">
                                        <option value=""> - Select - </option>
                                        <option value="active" @if(isset($record->status) and
                                            $record->status=='active' ) selected="selected" @endif>
                                            Active
                                        </option>
                                        <option value="discontinued" @if(isset($record->status) and
                                            $record->status=='discontinued' ) selected="selected" @endif>
                                            Discontinued
                                        </option>
                                        <option value="deactive" @if(isset($record->status) and
                                            $record->status=='deactive' ) selected="selected" @endif>
                                            Deactive
                                        </option>
                                    </select>
                                    <small class="form-text text-muted">Add Status.</small>
                                    @error('status')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="clear-fix">&nbsp;</div>
                        <button type="submit" value="save" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection