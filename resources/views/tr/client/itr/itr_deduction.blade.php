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
                    <div class="indicator-line"></div>
                    <div class="step step7">
                        <div class="step-icon">7</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step8">
                        <div class="step-icon">8</div>
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
                        <h5 class="page-title">Deductions</h5>
                        <div class="heading-elements">
                            <!-- <a class="btn btn-danger btn-sm px-5" href="{{route('articles.index') }}">
                                <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                            </a> -->
                        </div>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-deductions/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id ?? '' }}">
                        <input type="hidden" name="itr_sources_id" value="{{ $itr_sources_id ?? '' }}">
                        <div class="card card-default">
                            <div class="card-header">Section 80C</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="sec80c_lic_premium"><small>Life Insurance Premium
                                                (LIC)</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_lic_premium') is-invalid @enderror"
                                            name="sec80c_lic_premium"
                                            value="{{ $itr_deductions->sec80c_lic_premium ?? old('sec80c_lic_premium')??0 }}">
                                        @error('sec80c_lic_premium')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sec80c_pf"><small>PF</small></label>
                                        <input type="text" class="form-control @error('sec80c_pf') is-invalid @enderror"
                                            name="sec80c_pf"
                                            value="{{ $itr_deductions->sec80c_pf ?? old('sec80c_pf')??0 }}">
                                        @error('sec80c_pf')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sec80c_ppf"><small>PPF</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_ppf') is-invalid @enderror"
                                            name="sec80c_ppf"
                                            value="{{ $itr_deductions->sec80c_ppf ?? old('sec80c_ppf')??0 }}">
                                        @error('sec80c_ppf')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sec80c_housing_loan_repayment"><small>Principal Repayment on housing
                                                Loan</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_housing_loan_repayment') is-invalid @enderror"
                                            name="sec80c_housing_loan_repayment"
                                            value="{{ $itr_deductions->sec80c_housing_loan_repayment ?? old('sec80c_housing_loan_repayment')??0 }}">
                                        @error('sec80c_housing_loan_repayment')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="sec80c_fdr"><small>FDR (Tax Savings)</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_fdr') is-invalid @enderror"
                                            name="sec80c_fdr"
                                            value="{{ $itr_deductions->sec80c_fdr ?? old('sec80c_fdr')??0 }}">
                                        @error('sec80c_fdr')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sec80c_nsc"><small>NSC</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_nsc') is-invalid @enderror"
                                            name="sec80c_nsc"
                                            value="{{ $itr_deductions->sec80c_nsc ?? old('sec80c_nsc')??0 }}">
                                        @error('sec80c_nsc')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sec80c_tuition_fee"><small>Tuition fees</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_tuition_fee') is-invalid @enderror"
                                            name="sec80c_tuition_fee"
                                            value="{{ $itr_deductions->sec80c_tuition_fee ?? old('sec80c_tuition_fee')??0 }}">
                                        @error('sec80c_tuition_fee')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="sec80c_paid_to_annuity"><small>Premium paid to
                                                Annuity</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_paid_to_annuity') is-invalid @enderror"
                                            name="sec80c_paid_to_annuity"
                                            value="{{ $itr_deductions->sec80c_paid_to_annuity ?? old('sec80c_paid_to_annuity')??0 }}">
                                        @error('sec80c_paid_to_annuity')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="sec80c_other_deductions"><small>Other 80C Deductions</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80c_other_deductions') is-invalid @enderror"
                                            name="sec80c_other_deductions"
                                            value="{{ $itr_deductions->sec80c_other_deductions ?? old('sec80c_other_deductions')??0 }}">
                                        @error('sec80c_other_deductions')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-9"></div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>


                            </div>
                        </div>


                        <div class="clear-fix">&nbsp;</div>
                        <div class="card card-default">
                            <div class="card-header">Section 80D</div>
                            <div class="card-body">
                                <div class="sec-80d-block-box" id="sec-80d-block-box">
                                    @php
                                    $sec80d_deductions = json_decode($itr_deductions->sec80d_deductions);

                                    @endphp
                                    @if(isset($sec80d_deductions->sec80d_medical_insurance))
                                    @forelse($sec80d_deductions->sec80d_medical_insurance as $sec80d_medical_insurance)
                                    @include('tr.client.itr.template-parts.sec80d-block',['index' => $loop->index,
                                    'sec80d_medical_insurance' => $sec80d_medical_insurance,
                                    'sec80d_policy_holder_aged_60' =>
                                    $sec80d_deductions->sec80d_policy_holder_aged_60[$loop->index],
                                    'sec80d_health_checkup' => $sec80d_deductions->sec80d_health_checkup[$loop->index],
                                    'sec80d_medical_expenditure' =>
                                    $sec80d_deductions->sec80d_medical_expenditure[$loop->index],
                                    'sec80d_medical_insurance_premium' =>
                                    $sec80d_deductions->sec80d_medical_insurance_premium[$loop->index]])
                                    @empty
                                    @include('tr.client.itr.template-parts.sec80d-block',['index'=>0,
                                    'sec80d_medical_insurance'=>'', 'sec80d_policy_holder_aged_60'=>'',
                                    'sec80d_health_checkup'=>'', 'sec80d_medical_expenditure'=>'',
                                    'sec80d_medical_insurance_premium'=>''])
                                    @endforelse
                                    @else
                                    @include('tr.client.itr.template-parts.sec80d-block',['index'=>0,
                                    'sec80d_medical_insurance'=>'', 'sec80d_policy_holder_aged_60'=>'',
                                    'sec80d_health_checkup'=>'', 'sec80d_medical_expenditure'=>'',
                                    'sec80d_medical_insurance_premium'=>''])
                                    @endif

                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success btn-sm float-right" data-index="0"
                                            id="add-sec80d-block"> <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="clear-fix">&nbsp;</div>
                        <div class="card card-default">
                            <div class="card-header">Donation</div>
                            <div class="card-body">
                                <p>Under section 80G several donations are eligible for deduction either upto 100% or
                                    50% with or without restriction. just enter the amount we will automatically do the
                                    rest of calculation to get maximum refunds.</p>
                                <div class="donation-box-container">
                                    @php
                                    $donations = json_decode($itr_deductions->donations);
                                    $params = [
                                    'index' => 0,
                                    'name_of_donee' => '',
                                    'pan_of_donee' => '',
                                    'donation_in_cash' => '',
                                    'donation_in_other_mode' => '',
                                    'donation_amount' => '',
                                    'limit_of_deductions' => '',
                                    'donation_qualifying_percent' => '',
                                    'donee_pincode' => '',
                                    'donee_state' => '',
                                    'donee_city' => '',
                                    'donee_address' => '',
                                    ];
                                    @endphp

                                    @if(isset($donations->name_of_donee))
                                    @forelse($donations->name_of_donee as $name_of_donee)
                                    @php
                                    $params['index'] = $loop->index;
                                    $params['name_of_donee'] = $name_of_donee;
                                    $params['pan_of_donee'] = $donations->pan_of_donee[$loop->index];
                                    $params['donation_in_cash'] = $donations->donation_in_cash[$loop->index];
                                    $params['donation_in_other_mode'] =
                                    $donations->donation_in_other_mode[$loop->index];
                                    $params['donation_amount'] = $donations->donation_amount[$loop->index];
                                    $params['limit_of_deductions'] = $donations->limit_of_deductions[$loop->index];
                                    $params['donation_qualifying_percent'] =
                                    $donations->donation_qualifying_percent[$loop->index];
                                    $params['donee_pincode'] = $donations->donee_pincode[$loop->index];
                                    $params['donee_state'] = $donations->donee_state[$loop->index];
                                    $params['donee_city'] = $donations->donee_city[$loop->index];
                                    $params['donee_address'] = $donations->donee_address[$loop->index];
                                    @endphp
                                    @include('tr.client.itr.template-parts.donation-box',$params)
                                    @empty
                                    @include('tr.client.itr.template-parts.donation-box',$params)
                                    @endforelse
                                    @else
                                    @include('tr.client.itr.template-parts.donation-box',$params)
                                    @endif

                                </div>


                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success float-right btn-sm"
                                            id="add-donation-box" data-index="0">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="clear-fix">&nbsp;</div>
                            </div>
                        </div>
                        <div class="clear-fix">&nbsp;</div>
                        <div class="card card-default">
                            <div class="card-header">Other</div>
                            <div class="card-body">
                                <p>There are numerous funds and policies that can help save on tax which most people are
                                    unaware of. For all you know, there might already be a few that you've invested in
                                    without knowing how beneficial they actually are. We're here to help with that.</p>
                                <div class="any-other-deductions-section">
                                    @php
                                    $other_deductions = json_decode($itr_deductions->other_deductions);
                                    $params = [
                                    'index' => 0,
                                    'other_deduction_name' => '',
                                    'other_deduction_amount' => '0',
                                    ];
                                    @endphp

                                    @if(isset($other_deductions->other_deduction_name))
                                    @forelse($other_deductions->other_deduction_name as $other_deduction_name)
                                    @php
                                    $params['index'] = $loop->index;
                                    $params['other_deduction_name'] = $other_deduction_name;
                                    $params['other_deduction_amount'] =
                                    $other_deductions->other_deduction_amount[$loop->index];
                                    @endphp
                                    @include('tr.client.itr.template-parts.other-deductions',$params)
                                    @empty
                                    @include('tr.client.itr.template-parts.other-deductions',$params)
                                    @endforelse
                                    @else
                                    @include('tr.client.itr.template-parts.other-deductions',$params)
                                    @endif


                                    <div class="clear-fix">&nbsp;</div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success btn-sm float-right" data-index="0"
                                            id="add-other-deduction"> <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Section 80DD / 80U</h5>
                                        <p>You can claim tax refunds if you or any of your family member is disabled. If
                                            such is the case, we'll help lower the burden on your shoulders.</p>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sec80dd_uu_member"><small>Disabled Member</small></label>
                                        <select name="sec80dd_uu_member"
                                            class="form-control @error('sec80dd_uu_member') is-invalid @enderror">
                                            <option value="">Please Select Member</option>
                                            <option value="self" @if( isset($itr_deductions->sec80dd_uu_member) &&
                                                ($itr_deductions->sec80dd_uu_member == 'self' ) ) selected="selected"
                                                @endif>Self
                                            </option>
                                            <option value="family" @if( isset($itr_deductions->sec80dd_uu_member) &&
                                                ($itr_deductions->sec80dd_uu_member == 'family' ) ) selected="selected"
                                                @endif>Family Member</option>
                                        </select>
                                        @error('sec80dd_uu_member')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="sec80dd_uu_expenditure"><small>Total Expenditure</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80dd_uu_expenditure') is-invalid @enderror"
                                            name="sec80dd_uu_expenditure"
                                            value="{{ $itr_deductions->sec80dd_uu_expenditure ?? old('sec80dd_uu_expenditure')??0 }}">
                                        @error('sec80dd_uu_expenditure')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>

                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="value_of_perquisites"><small>Severity of disability</small></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="radio-container">More than 40%
                                            <input type="radio" checked="checked"
                                                name="sec80dd_uu_disability_percentage" value="More than 40%" @if(
                                                isset($itr_deductions->sec80dd_uu_disability_percentage) &&
                                            ($itr_deductions->sec80dd_uu_disability_percentage == 'More than 40%' ) )
                                            checked="checked"
                                            @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="radio-container">More than 80%
                                            <input type="radio" name="sec80dd_uu_disability_percentage"
                                                value="More than 80%" @if(
                                                isset($itr_deductions->sec80dd_uu_disability_percentage) &&
                                            ($itr_deductions->sec80dd_uu_disability_percentage == 'More than 80%' ) )
                                            checked="checked"
                                            @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Section 80DDB</h5>
                                        <p>You can claim tax refunds if you or any of your family member is diseased. If
                                            such is the case, we'll help lower the burden on your shoulders.</p>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sec80ddb_citizen"><small>Diseased Citizen</small></label>
                                        <select name="sec80ddb_citizen"
                                            class="form-control @error('sec80ddb_citizen') is-invalid @enderror"
                                            id="sec80ddb_citizen">
                                            <option value="">Please Select Member</option>
                                            <option value="normal" @if( isset($itr_deductions->sec80ddb_citizen) &&
                                                ($itr_deductions->sec80ddb_citizen == 'normal' ) )
                                                selected="selected"
                                                @endif>Normal Citizen (Less than 60 years of age)</option>
                                            <option value="senior" @if( isset($itr_deductions->sec80ddb_citizen) &&
                                                ($itr_deductions->sec80ddb_citizen == 'senior' ) )
                                                selected="selected"
                                                @endif>Senior Citizen (60 or more)</option>
                                        </select>
                                        @error('sec80ddb_citizen')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="sec80ddb_expenditure"><small>Total Expenditure</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80ddb_expenditure') is-invalid @enderror"
                                            name="sec80ddb_expenditure"
                                            value="{{ $itr_deductions->sec80ddb_expenditure ?? old('sec80ddb_expenditure')??0 }}">
                                        @error('sec80ddb_expenditure')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Section 80E</h5>
                                        <p>Did you know that your education loan can get you access to the best of
                                            universities and the interest paid on it can be claimed as a deduction.</p>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sec80e_int_on_edu_loan"><small>Interest on education
                                                loan</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80e_int_on_edu_loan') is-invalid @enderror"
                                            name="sec80e_int_on_edu_loan"
                                            value="{{ $itr_deductions->sec80e_int_on_edu_loan ?? old('sec80e_int_on_edu_loan')??0 }}">
                                        @error('sec80e_int_on_edu_loan')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Section 80GG</h5>
                                        <p>You can claim tax benefits against the amount you have paid as house rent. It
                                            can be claimed only if you do not either receive or claim your HRA.</p>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sec80gg_rent_paid"><small>Rent Paid for the year</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80gg_rent_paid') is-invalid @enderror"
                                            name="sec80gg_rent_paid"
                                            value="{{ $itr_deductions->sec80gg_rent_paid ?? old('sec80gg_rent_paid')??0 }}">
                                        @error('sec80gg_rent_paid')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="sec80gg_num_of_months"><small>Number of months rent is paid
                                                for</small></label>
                                        <input type="text"
                                            class="form-control @error('sec80gg_num_of_months') is-invalid @enderror"
                                            name="sec80gg_num_of_months"
                                            value="{{ $itr_deductions->sec80gg_num_of_months ?? old('sec80gg_num_of_months')??0 }}">
                                        @error('sec80gg_num_of_months')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>


                                <div class="clear-fix">&nbsp;</div>
                            </div>
                        </div>


                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-other-income', ['id' => $itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                                @if($id!='')
                                <a href="{{ route('tr/user/itr-bank-details',['id' => $itr_sources_id ]) }}"
                                    class="btn btn-info px-5">Next</a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-info px-5">Next</a>
                                @endif
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

    function add_sec80d_block(elem) {
        let action = 'sec80d_block_box';
        let index = elem.attr('data-index');
        index = parseInt(index) + 1;
        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                index
            },
            success: function(response) {
                $(".sec-80d-block-box").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-sec80d-block").on('click', function() {
                    $(this).parent().parent().remove();
                });
                // re-initiate it
                $(".policy-hoder-aged-60").on('click', function() {
                    let index = $(this).attr('data-index');
                    if ($(this).is(":checked")) {
                        $(".medical-expenditure-" + index).removeClass('d-none');
                        $(".medical-expenditure-" + index).addClass('d-block');
                    } else {
                        $(".medical-expenditure-" + index).removeClass('d-block');
                        $(".medical-expenditure-" + index).addClass('d-none');
                    }
                });
            }
        });
    }
    $("#add-sec80d-block").on('click', function() {
        add_sec80d_block($(this));
    });
    $(".remove-sec80d-block").on('click', function() {
        $(this).parent().parent().remove();
    });

    $(".policy-hoder-aged-60").on('click', function() {
        let index = $(this).attr('data-index');
        if ($(this).is(":checked")) {
            $(".medical-expenditure-" + index).removeClass('d-none');
            $(".medical-expenditure-" + index).addClass('d-block');
        } else {
            $(".medical-expenditure-" + index).removeClass('d-block');
            $(".medical-expenditure-" + index).addClass('d-none');
        }
    });

    ///add-donation-box
    function add_donation_box(elem) {
        let action = 'donation_box';
        let index = elem.attr('data-index');
        index = parseInt(index) + 1;
        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                index
            },
            success: function(response) {
                $(".donation-box-container").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-donation-box").on('click', function() {
                    $(this).parent().parent().parent().remove();
                });
            }
        });
    }

    $("#add-donation-box").on('click', function() {
        add_donation_box($(this));
    });
    $(".remove-donation-box").on('click', function() {
        $(this).parent().parent().parent().remove();
    });

    //add-other-deduction
    function add_other_deduction_box(elem) {
        let action = 'other_deduction_box';
        let index = elem.attr('data-index');
        index = parseInt(index) + 1;
        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                index
            },
            success: function(response) {
                $(".any-other-deductions-section").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-other-deduction").on('click', function() {
                    $(this).parent().parent().remove();
                });
            }
        });
    }

    $("#add-other-deduction").on('click', function() {
        add_other_deduction_box($(this));
    });
    $(".remove-other-deduction").on('click', function() {
        $(this).parent().parent().remove();
    });







})
</script>
@endsection