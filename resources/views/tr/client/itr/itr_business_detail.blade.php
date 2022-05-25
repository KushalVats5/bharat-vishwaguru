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
                    <div class="step step5">
                        <div class="step-icon">5</div>
                    </div>
                    <div class="indicator-line"></div>
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
                        <h5 class="page-title">Business Income Details</h5>
                        <div class="heading-elements">
                            <!-- <a class="btn btn-danger btn-sm px-5" href="{{route('articles.index') }}">
                                <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                            </a> -->
                        </div>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-business-income/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id ?? '' }}">
                        <input type="hidden" name="itr_sources_id" value="{{ $itr_sources_id ?? '' }}">
                        <div class="business-income-box" id="business-income-box">
                            @php
                            $presumptive_business_incomes = ($itr_business_details)?
                            json_decode($itr_business_details->presumptive_business_income):[];
                            @endphp
                            @if($presumptive_business_incomes)
                            @forelse($presumptive_business_incomes->business_nature as $bs)
                            @include('tr.client.itr.template-parts.presumptive-business-income', ['index'=>$loop->index,
                            'business_nature'=>$bs,
                            'name_of_the_business'=>$presumptive_business_incomes->name_of_the_business[$loop->index],
                            'gross_turnover_receipt'=>$presumptive_business_incomes->gross_turnover_receipt[$loop->index],
                            'total_presumptive_income'=>$presumptive_business_incomes->total_presumptive_income[$loop->index]])
                            @empty
                            @include('tr.client.itr.template-parts.presumptive-business-income', ['index'=>0,
                            'business_nature'=>'',
                            'name_of_the_business'=>'',
                            'gross_turnover_receipt'=>'',
                            'total_presumptive_income'=>''])
                            @endforelse
                            @else
                            @include('tr.client.itr.template-parts.presumptive-business-income', ['index'=>0,
                            'business_nature'=>'',
                            'name_of_the_business'=>'',
                            'gross_turnover_receipt'=>'',
                            'total_presumptive_income'=>''])
                            @endif

                        </div>


                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-success float-right" id="add-business-income"
                                    data-index="0"> <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="clear-fix">&nbsp;</div>
                        <div class="card card-default">
                            <div class="card-header">Financial Particulars</div>
                            <div class="card-body">

                                <div class="row border padding-10">
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Financial Particulars (as on 31st March)</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="checkbox" name="financial_particular_on_31_march" value="1"
                                            id="financial_particular_on_31_march" @if(
                                            isset($itr_business_details->financial_particular_on_31_march) &&
                                        ($itr_business_details->financial_particular_on_31_march == 1) )
                                        checked="checked" @endif>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>

                                <div class="financial-particular-31-march @if(
                                            isset($itr_business_details->financial_particular_on_31_march) &&
                                        ($itr_business_details->financial_particular_on_31_march == 1) )
                                        d-block @else d-none @endif" id="total-assets">

                                    <label class="font-weight-bold">Total Assets</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="fixed_assets"><small>Fixed Assets</small></label>
                                            <input type="text"
                                                class="form-control @error('fixed_assets') is-invalid @enderror"
                                                name="fixed_assets"
                                                value="{{ $itr_business_details->fixed_assets ?? old('fixed_assets')??'0' }}">
                                            @error('fixed_assets')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="stock_in_trade"><small>Stock-in-Trade</small></label>
                                            <input type="text"
                                                class="form-control @error('stock_in_trade') is-invalid @enderror"
                                                name="stock_in_trade"
                                                value="{{ $itr_business_details->stock_in_trade ?? old('stock_in_trade')??'0' }}">
                                            @error('stock_in_trade')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="balance_with_banks"><small>Balance with
                                                    Banks</small></label>
                                            <input type="text"
                                                class="form-control @error('balance_with_banks') is-invalid @enderror"
                                                name="balance_with_banks"
                                                value="{{ $itr_business_details->balance_with_banks ?? old('balance_with_banks')??'0' }}">
                                            @error('balance_with_banks')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="cash_balance"><small>Cash Balance</small></label>
                                            <input type="text"
                                                class="form-control @error('cash_balance') is-invalid @enderror"
                                                name="cash_balance"
                                                value="{{ $itr_business_details->cash_balance ?? old('cash_balance')??'0' }}">
                                            @error('cash_balance')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="clear-fix">&nbsp;</div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="sundry_debtors"><small>Sundry Debtors</small></label>
                                            <input type="text"
                                                class="form-control @error('sundry_debtors') is-invalid @enderror"
                                                name="sundry_debtors"
                                                value="{{ $itr_business_details->sundry_debtors ?? old('sundry_debtors')??'0' }}">
                                            @error('sundry_debtors')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="loans_and_advances"><small>Loans and Advances</small></label>
                                            <input type="text"
                                                class="form-control @error('loans_and_advances') is-invalid @enderror"
                                                name="loans_and_advances"
                                                value="{{ $itr_business_details->loans_and_advances ?? old('loans_and_advances')??'0' }}">
                                            @error('loans_and_advances')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="other_assets"><small>Other Assets</small></label>
                                            <input type="text"
                                                class="form-control @error('other_assets') is-invalid @enderror"
                                                name="other_assets"
                                                value="{{ $itr_business_details->other_assets ?? old('other_assets')??'0' }}">
                                            @error('other_assets')<span
                                                class="invalid-feedback">{{ $message }}</span>@enderror
                                        </div>

                                    </div>
                                </div>




                                <div class="clear-fix">&nbsp;</div>
                                <label class="font-weight-bold">Total Capital and Liabilities</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label><small>Partner / Members own Capital</small></label>
                                        <input type="text"
                                            class="form-control @error('members_own_capital') is-invalid @enderror"
                                            name="members_own_capital"
                                            value="{{ $itr_business_details->members_own_capital ?? old('members_own_capital')??'0' }}">
                                        @error('members_own_capital')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><small>Secured Loans </small></label>
                                        <input type="text"
                                            class="form-control @error('secured_loans') is-invalid @enderror"
                                            name="secured_loans"
                                            value="{{ $itr_business_details->secured_loans ?? old('secured_loans')??'0' }}">
                                        @error('secured_loans')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><small>Unsecured Loans </small></label>
                                        <input type="text"
                                            class="form-control @error('unsecured_loans') is-invalid @enderror"
                                            name="unsecured_loans"
                                            value="{{ $itr_business_details->unsecured_loans ?? old('unsecured_loans')??'0' }}">
                                        @error('unsecured_loans')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><small>Advances </small></label>
                                        <input type="text" class="form-control @error('advances') is-invalid @enderror"
                                            name="advances"
                                            value="{{ $itr_business_details->advances ?? old('advances')??'0' }}">
                                        @error('advances')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label><small>Sundry Creditors</small></label>
                                        <input type="text"
                                            class="form-control @error('sundry_creditors') is-invalid @enderror"
                                            name="sundry_creditors"
                                            value="{{ $itr_business_details->sundry_creditors ?? old('sundry_creditors')??'0' }}">
                                        @error('sundry_creditors')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <label><small>Other Liabilities </small></label>
                                        <input type="text"
                                            class="form-control @error('other_liabilities') is-invalid @enderror"
                                            name="other_liabilities"
                                            value="{{ $itr_business_details->other_liabilities ?? old('other_liabilities')??'0' }}">
                                        @error('other_liabilities')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>

                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <label class="font-weight-bold">Turnover / Gross Receipt reported for GST</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><small>GSTIN</small></label>
                                        <input type="text" class="form-control @error('gstin') is-invalid @enderror"
                                            name="gstin"
                                            value="{{ $itr_business_details->gstin ?? old('gstin')??'0' }}">
                                        @error('gstin')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label><small>Turnover / Gross receipt as per the GST return filed
                                            </small></label>
                                        <input type="text"
                                            class="form-control @error('turnover_as_per_gst_return') is-invalid @enderror"
                                            name="turnover_as_per_gst_return"
                                            value="{{ $itr_business_details->turnover_as_per_gst_return ?? old('turnover_as_per_gst_return')??'0' }}">
                                        @error('turnover_as_per_gst_return')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-employment', ['id'=>$itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                                @if($id!='')
                                <a href="{{ route('tr/user/itr-other-income',['id'=>$itr_sources_id]) }}"
                                    class="btn btn-info  px-5">Next</a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-info  px-5 disabled">Next</a>
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
    function add_business_income(elem) {
        let action = 'business_income_box';
        let index = elem.attr('data-index');
        index = parseInt(index) + 1;
        //let salary_box_index = elem.attr('data-sb-index');

        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                index
            },
            success: function(response) {
                $(".business-income-box").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-business-details").on('click', function() {
                    $(this).parent().parent().remove();
                });
            }
        });
    }
    $("#add-business-income").on('click', function() {
        add_business_income($(this));
    });
    $(".remove-business-details").on('click', function() {
        $(this).parent().parent().remove();
    });
    $("#financial_particular_on_31_march").on('click', function() {

        if ($(this).is(":checked")) {
            $("#total-assets").removeClass('d-none');
            $("#total-assets").addClass('d-block');
        } else {
            $("#total-assets").removeClass('d-block');
            $("#total-assets").addClass('d-none');

        }
    });

})
</script>
@endsection