@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Return Filing Type</h5>
                    </div>

                    <hr />
                    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $itr_source->id ?? '' }}">
                        <div class="card card-default">
                            <div class="card-header">ITR Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Return Filing Type</h5>
                                        <p>If you have already filed ITR for this year and want to make corrections
                                            select Revised Return, else leave it</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Check if Revised Return</label>
                                        <input type="checkbox" class="form-control" name="value_of_perquisites">
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="self-assesment-tax-payment-box">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="value_of_perquisites"><small>Original ITR Acknowledgement
                                                    no.*</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="value_of_perquisites"><small>Date of Filing Original
                                                    Return*</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>

                                    </div>
                                </div>


                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Are you filing return of income under seventh proviso to section 139(1)</h5>
                                        <p>Select Yes in case your gross income does not exceed Rs. 2.5 Lakh and you
                                            have deposited the amount exceeding Rs.1 Crore in current account during the
                                            financial year OR incurred the electricity expenses more than Rs. 1 lakh OR
                                            incurred the Foreign Travelling expenses more than Rs. 2 lakh.</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Check if yes</label>
                                        <input type="checkbox" class="form-control" name="value_of_perquisites">
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="tds-apid-other-salary">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label><small>Enter Deposit Amount, If you
                                                    deposited amounts exceeding Rs. 1 Crore in one or more current
                                                    accounts during the Financial Year ?</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="clear-fix">&nbsp;</div>
                                        <div class="col-sm-12">
                                            <label><small>Enter Expenditure Amount, If you
                                                    incurred expenditure of an amount exceeding Rs. 2 lakhs for travel
                                                    to a foreign country for yourself or for any other person
                                                    ?</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="clear-fix">&nbsp;</div>
                                        <div class="col-sm-12">
                                            <label><small>Enter Expenditure Amount, If you
                                                    incurred expenditure of an amount exceeding Rs. 1 lakh on
                                                    consumption of electricity during the Financial Year
                                                    ?</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>

                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>

                            </div>
                        </div>

                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-prepaid-tax') }}" class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Next</button>
                                <a href="{{ route('tr/user/itr-itr-calculate') }}"
                                    class="btn btn-primary  px-5">Next...</a>
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
@section('script')
<script>
$(document).ready(function() {


})
</script>
@endsection