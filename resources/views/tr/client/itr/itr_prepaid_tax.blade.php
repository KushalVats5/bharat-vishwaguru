@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


            <div class="container border margin-5b">
                <section class="step-indicator">
                    <div class="step step1 active">
                        <div class="step-icon">1</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step2 active">
                        <div class="step-icon">2</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step3 active">
                        <div class="step-icon">3</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step4 active">
                        <div class="step-icon">4</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step5 active">
                        <div class="step-icon">5</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step6 active">
                        <div class="step-icon active">6</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step7 active">
                        <div class="step-icon active">7</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step8 active">
                        <div class="step-icon active">8</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step9">
                        <div class="step-icon">9</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step10">
                        <div class="step-icon">10</div>
                    </div>
                </section>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Prepaid Tax</h5>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-prepaid-tax/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $itr_source->id ?? '' }}">
                        <div class="card card-default">
                            <div class="card-header">Prepaid Tax</div>
                            <div class="card-body">
                                <div class="tds-sal-inc">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h6>TDS on Salary Income</h6>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Company / Employer
                                                    Name</small></label>
                                            <input type="text" readonly class="form-control"
                                                name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="value_of_perquisites"><small>TAN of the Employer
                                                    *</small></label>
                                            <input type="text" readonly class="form-control"
                                                name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Salary/Pension Amount
                                                    *</small></label>
                                            <input type="text" readonly class="form-control"
                                                name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Tax Amount *</small></label>
                                            <input type="text" readonly class="form-control"
                                                name="value_of_perquisites">
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <label for="si_tds_deducted_0" class="hidden-xs">&nbsp;</label>
                                            <a href="#" class="btn btn-info align-middle">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Advance Tax and Self Assessment Tax Payment</h5>
                                        <p>Help us understand what advance tax you have already paid and we'll
                                            automatically consider it in your Income Tax return.</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Check if yes</label>
                                        <input type="checkbox" readonly class="form-control"
                                            name="value_of_perquisites">
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="self-assesment-tax-payment-box">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>BSR Code *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Date of Challan *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Challan No. *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Tax Amount *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success float-right"> <i
                                                class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Details of TDS Paid on Other Than Salary</h5>
                                        <p>If you've had TDS deducted on any source of income except salary; like on
                                            interest, rent etc. then you can enter here. (refer Form 16A or 26AS)</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Check if yes</label>
                                        <input type="checkbox" readonly class="form-control"
                                            name="value_of_perquisites">
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="tds-apid-other-salary">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Name of the Deductor
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>TAN of the Deductor
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Amount on which TDS deducted
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Total TDS deducted
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="value_of_perquisites"><small>Head of Income *</small></label>
                                            <select name="head_of_income[1]"
                                                class="form-control textBoxes head_of_income" id="head_of_income_1"
                                                data-dirrty-initial-value="" data-is-dirrty="false">
                                                <option value="" selected="selected">Please Select</option>
                                                <option value="BP">Income from Business and Profession</option>
                                                <option value="HP">Income from House Property</option>
                                                <option value="OS">Income from Other Source</option>
                                                <option value="EI">Exempt Income</option>
                                                <option value="NA">Not Applicable (only in case TDS is deducted u/s
                                                    194N)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success float-right"> <i
                                                class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>


                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Details of TDS Paid on Rental Income</h5>
                                        <p>If you have received rent exceeding Rs. 50,000 per month then this section is
                                            for you!! Enter the details of TDS deducted on rent by your tenant u/s
                                            194IB. You can also check this from Form 26AS.</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Check if yes</label>
                                        <input type="checkbox" readonly class="form-control"
                                            name="value_of_perquisites">
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="tds-apid-other-salary">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Name of the Deductor
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>PAN of the Deductor
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Amount on which TDS deducted
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Total TDS deducted
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="value_of_perquisites"><small>Head of Income *</small></label>
                                            <select name="tds_26qc_head_of_income[1]"
                                                class="form-control textBoxes tds_26qc_head_of_income"
                                                id="tds_26qc_head_of_income_1" data-dirrty-initial-value=""
                                                data-is-dirrty="false">
                                                <option value="" selected="selected">Please Select</option>
                                                <option value="HP">Income from House Property</option>
                                                <option value="BP">Income from Business and Profession</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success float-right"> <i
                                                class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5>Details of Tax Collected at Source</h5>
                                        <p>If at the time of sale of the specified category of goods, the seller has
                                            collected TCS from you then enter the details here. You can also check this
                                            from Form 26AS.</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Check if yes</label>
                                        <input type="checkbox" readonly class="form-control"
                                            name="value_of_perquisites">
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="self-assesment-tax-payment-box">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Name of Collector *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>TAN of the Collector
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Amount on which TCS collected
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="value_of_perquisites"><small>Total TCS Collected
                                                    *</small></label>
                                            <input type="text" class="form-control" name="value_of_perquisites">
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success float-right"> <i
                                                class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>




                            </div>
                        </div>

                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-bank-details',['id' => $itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Next</button>
                                <a href="{{ route('tr/user/itr-itr-details') }}"
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