@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix content-center">

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">&nbsp;</div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="page-title">Add GST Bills</h5>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <hr />
                    <form action="{{ route('tr/user/gst-return-file/save-bills') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="gst_info_id" value="{{ $gst_info->id ?? '' }}">
                        <input type="hidden" name="service_plan_id" value="{{ $gst_info->id ?? '' }}">

                        <div class="row">
                            <div class="col-sm-12">
                                <p>Add Bills for GST No. : {{ $gst_info->gst_no }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Month &amp; Year Details:</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="financial_year">Financial Year</label>
                                    <select name="financial_year" id="financial_year" class="form-control">
                                        <option value="">-Select-</option>
                                        @foreach($plan_validity as $year => $month)
                                        <option value="{{$year}}" data-months="{{ json_encode($month) }}">{{$year}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('financial_year')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <select name="month" id="month" class="form-control">
                                        <option value="">-Select-</option>
                                    </select>
                                    @error('month')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Bills Details</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="is_file_nill">Do you want to file GST for Nill?</label>
                                    <select name="is_file_nill" id="is_file_nill" class="form-control">
                                        <option value="">-Select-</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('is_file_nill')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="is_json_bills">Do you want to upload JSON?</label>
                                    <select name="is_json_bills" id="is_json_bills" class="form-control">
                                        <option value="">-Select-</option>
                                        <option value="1">Yes</option>
                                        <option value="0" selected="selected">No</option>
                                    </select>
                                    @error('is_json_bills')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="sales_bills">Sales Bills</label>
                                    <input type="file" id="sales_bills" name="sales_bills[]" multiple>
                                    <small class="form-text text-muted">Add multiple pdf/jpg/png files only.</small>
                                    @error('sales_bills.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="purchase_bills">Purchase Bills</label>
                                    <input type="file" id="purchase_bills" name="purchase_bills[]" multiple>
                                    <small class="form-text text-muted">Add multiple pdf/jpg/png files only.</small>
                                    @error('purchase_bills.*')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="json_bills">Bills Json File</label>
                                    <input type="file" id="json_bills" name="json_bills" disabled>
                                    <small class="form-text text-muted">Add multiple json files only.</small>
                                    @error('sales_bills.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-danger">You are allowed to add your sales and purchase bills only at
                            once for a particular month. So please be sure you have collected all the bills before
                            requesting GST filling for the considered month.</div>


                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">&nbsp;</div>
    </div>
    <!-- #END# Vertical Layout -->

</div>
@endsection
@section('script')
<script>
$(document).ready(function() {

    $("#financial_year").on('change', function() {
        let data_months = $(this).find(':selected').attr('data-months');
        let return_to_file_months = document.getElementById("month");
        data_months = JSON.parse(data_months);

        /*remove existing options*/
        let length = return_to_file_months.options.length;
        for (i = length - 1; i >= 0; i--) {
            return_to_file_months.options[i] = null;
        }

        let default_option = document.createElement("option");
        default_option.text = '--Select--';
        default_option.value = '';
        return_to_file_months.add(default_option);

        data_months.forEach(function(item, index) {
            let option = document.createElement("option");
            option.text = item;
            option.value = item;
            return_to_file_months.add(option);
        });


    });

    $("#is_file_nill").on('change', function() {
        if ($(this).val() == 1) {
            $("#is_json_bills").attr('disabled', true);
            $("#sales_bills").attr('disabled', true);
            $("#purchase_bills").attr('disabled', true);
            $("#json_bills").attr('disabled', true);
        } else {
            $("#is_json_bills").removeAttr('disabled');
            if ($("#is_json_bills").val() == 0) {
                $("#json_bills").attr('disabled', true);
                $("#sales_bills").removeAttr('disabled');
                $("#purchase_bills").removeAttr('disabled');
            } else {
                $("#json_bills").removeAttr('disabled');
            }
        }
    });

    $("#is_json_bills").on('change', function() {
        if ($(this).val() == 1) {
            $("#sales_bills").attr('disabled', true);
            $("#purchase_bills").attr('disabled', true);
            $("#json_bills").removeAttr('disabled');
        } else {
            $("#sales_bills").removeAttr('disabled');
            $("#purchase_bills").removeAttr('disabled');
            $("#json_bills").attr('disabled', true);
        }
    });



})
</script>
@endsection