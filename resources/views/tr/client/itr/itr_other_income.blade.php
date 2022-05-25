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
                    <div class="step step6">
                        <div class="step-icon">6</div>
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
                        <h5 class="page-title">Other Income Details</h5>
                        <div class="heading-elements">
                            <!-- <a class="btn btn-danger btn-sm px-5" href="{{route('articles.index') }}">
                                <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                            </a> -->
                        </div>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-other-income/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id ?? '' }}">
                        <input type="hidden" name="itr_sources_id" value="{{ $itr_sources_id ?? '' }}">
                        <div class="card card-default">
                            <div class="card-header">Other Income Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="interest_from_saving_bank_ac"><small>Interest from Saving Bank
                                                A/c</small></label>
                                        <input type="text" class="form-control" name="interest_from_saving_bank_ac"
                                            value="{{ $itr_other_income->interest_from_saving_bank_ac ?? old('interest_from_saving_bank_ac')??'0' }}">
                                        @error('interest_from_saving_bank_ac')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="interest_from_fixed_deposit"><small>Interest from Fixed
                                                Deposit</small></label>
                                        <input type="text" class="form-control" name="interest_from_fixed_deposit"
                                            value="{{ $itr_other_income->interest_from_fixed_deposit ?? old('interest_from_fixed_deposit')??'0' }}">
                                        @error('interest_from_fixed_deposit')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="interest_from_income_tax_refund"><small>Interest from Income Tax
                                                Refund</small></label>
                                        <input type="text" class="form-control" name="interest_from_income_tax_refund"
                                            value="{{ $itr_other_income->interest_from_income_tax_refund ?? old('interest_from_income_tax_refund')??'0' }}">
                                        @error('interest_from_income_tax_refund')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="clear-fix">&nbsp;</div>
                                <div class="row padding-10">
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Received Family Pension?</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="checkbox" class="form-control" name="receive_family_pension"
                                            id="receive_family_pension" value="1" @if(
                                            isset($itr_other_income->receive_family_pension) &&
                                        ($itr_other_income->receive_family_pension == 1) )
                                        checked="checked" @endif />
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="received-family-pension {{((isset($itr_other_income->receive_family_pension)) && ($itr_other_income->receive_family_pension))?'d-block':'d-none'}}"
                                    id="received-family-pension">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="family_pension_received"><small>Family Pension
                                                    Received</small></label>
                                            <input type="text" class="form-control" name="family_pension_received"
                                                value="{{ $itr_other_income->family_pension_received ?? old('family_pension_received')??'0' }}">
                                            @error('family_pension_received')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="deduction_under_57iia"><small>Less: Deduction u/s
                                                    57(iia)</small></label>
                                            <input type="text" class="form-control" name="deduction_under_57iia"
                                                value="{{ $itr_other_income->deduction_under_57iia ?? old('deduction_under_57iia')??'0' }}"
                                                readonly="readonly">
                                            @error('deduction_under_57iia')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="net_family_pension"><small>Net Family Pension</small></label>
                                            <input type="text" class="form-control" name="net_family_pension"
                                                value="{{ $itr_other_income->net_family_pension ?? old('net_family_pension')??'0' }}"
                                                readonly="readonly">
                                            @error('net_family_pension')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="font-weight-bold">Any Other Income</label>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="any_other_income"><small>Other Income Amount</small></label>
                                        <input type="text" class="form-control" name="any_other_income"
                                            value="{{ $itr_other_income->any_other_income ?? old('any_other_income')??'0' }}">
                                        @error('any_other_income')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row padding-10">
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Do you have Dividend Income?</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="checkbox" class="form-control" name="dividend_income"
                                            id="dividend_income" value="1" @if(
                                            isset($itr_other_income->dividend_income) &&
                                        ($itr_other_income->dividend_income == 1) )
                                        checked="checked" @endif />
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="dividend-income {{( isset($itr_other_income->dividend_income) && ($itr_other_income->dividend_income))?'d-block':'d-none'}}"
                                    id="dividend-income">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>Please provide Quarterly breakup of Dividend Income</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="di_upto_15jun"><small> Up to 15-Jun</small></label>
                                            <input type="text" class="form-control" name="di_upto_15jun"
                                                value="{{ $itr_other_income->di_upto_15jun ?? old('di_upto_15jun')??'0' }}">
                                            @error('di_upto_15jun')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="di_16jun_to_15sep"><small>From 16-Jun to
                                                    15-Sep</small></label>
                                            <input type="text" class="form-control" name="di_16jun_to_15sep"
                                                value="{{ $itr_other_income->di_16jun_to_15sep ?? old('di_16jun_to_15sep')??'0' }}">
                                            @error('di_16jun_to_15sep')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="di_16sep_to_15dec"><small>From 16-Sep to
                                                    15-Dec</small></label>
                                            <input type="text" class="form-control" name="di_16sep_to_15dec"
                                                value="{{ $itr_other_income->di_16sep_to_15dec ?? old('di_16sep_to_15dec')??'0' }}">
                                            @error('di_16sep_to_15dec')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="clear-fix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="di_16dec_to_15mar"><small> From 16-Dec to
                                                    15-Mar</small></label>
                                            <input type="text" class="form-control" name="di_16dec_to_15mar"
                                                value="{{ $itr_other_income->di_16dec_to_15mar ?? old('di_16dec_to_15mar')??'0' }}">
                                            @error('di_16dec_to_15mar')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="di_16mar_to_31mar"><small> From 16-Mar to
                                                    31-Mar</small></label>
                                            <input type="text" class="form-control" name="di_16mar_to_31mar"
                                                value="{{ $itr_other_income->di_16mar_to_31mar ?? old('di_16mar_to_31mar')??'0' }}">
                                            @error('di_16mar_to_31mar')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row padding-10">
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Exempt Income: For reporting purpose</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="checkbox" class="form-control" name="exempted_income_check"
                                            id="exempted_income_check" value="1" @if(
                                            isset($itr_other_income->exempted_income_check) &&
                                        ($itr_other_income->exempted_income_check == 1) )
                                        checked="checked" @endif />
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="exempt-income {{(isset($itr_other_income->exempted_income_check) && ($itr_other_income->exempted_income_check))?'d-block':'d-none'}}"
                                    id="exempt-income">
                                    <div class="exempted-income-box" id="exempted-income-box">
                                        @php
                                        $exempted_income =
                                        ($itr_other_income)?json_decode($itr_other_income->exempted_income):[];
                                        @endphp
                                        @if(isset($exempted_income->exempted_income_source))

                                        @forelse( $exempted_income->exempted_income_source as $income_source )
                                        @include('tr.client.itr.template-parts.exempt-income-reporting',['index' =>
                                        $loop->index,
                                        'exempted_income_source' => $income_source,
                                        'exempted_income_amount' =>
                                        $exempted_income->exempted_income_amount[$loop->index] ] )
                                        @empty
                                        @include('tr.client.itr.template-parts.exempt-income-reporting',['index' => 0,
                                        'exempted_income_source' => '',
                                        'exempted_income_amount' => ''])
                                        @endforelse
                                        @else
                                        @include('tr.client.itr.template-parts.exempt-income-reporting',['index'=>0,'exempted_income_source'=>'',
                                        'exempted_income_amount'=>''])
                                        @endif
                                    </div>
                                    <div class="clear-fix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-success float-right" data-index="0"
                                                id="add-exempted-income"> <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-business-income',['id'=>$itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                                @if($id!='')
                                <a href="{{ route('tr/user/itr-deductions',['id' => $itr_sources_id ]) }}"
                                    class="btn btn-info px-5">Next</a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-info disabled px-5">Next</a>
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

    $("#receive_family_pension").on('click', function() {
        if ($(this).is(":checked")) {
            $("#received-family-pension").removeClass('d-none');
            $("#received-family-pension").addClass('d-block');
        } else {
            $("#received-family-pension").removeClass('d-block');
            $("#received-family-pension").addClass('d-none');
        }
    });
    //dividend_income
    $("#dividend_income").on('click', function() {
        if ($(this).is(":checked")) {
            $("#dividend-income").removeClass('d-none');
            $("#dividend-income").addClass('d-block');
        } else {
            $("#dividend-income").removeClass('d-block');
            $("#dividend-income").addClass('d-none');
        }
    });

    //
    $("#exempted_income_check").on('click', function() {
        if ($(this).is(":checked")) {
            $("#exempt-income").removeClass('d-none');
            $("#exempt-income").addClass('d-block');
        } else {
            $("#exempt-income").removeClass('d-block');
            $("#exempt-income").addClass('d-none');
        }
    });

    function add_exempted_income(elem) {
        let action = 'exempted_income_box';
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
                $(".exempted-income-box").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-exempted-income-box").on('click', function() {
                    $(this).parent().parent().remove();
                });
            }
        });
    }
    $("#add-exempted-income").on('click', function() {
        add_exempted_income($(this));
    });
    $(".remove-exempted-income-box").on('click', function() {
        $(this).parent().parent().remove();
    });
})
</script>
@endsection