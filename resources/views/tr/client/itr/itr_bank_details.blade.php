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
                        <h5 class="page-title">Bank & AADHAAR Details</h5>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-bank-details/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id ?? '' }}">
                        <input type="hidden" name="itr_sources_id" value="{{ $itr_sources_id ?? '' }}">
                        <div class="card card-default">
                            <div class="card-header">Bank & AADHAAR Details</div>
                            <div class="card-body">
                                <div class="bank-detail-box" id="bank-detail-box">
                                    @php
                                    $bank_info = json_decode($itr_bank_details->bank_info);
                                    $params = [
                                    'index' => 0,
                                    'ifsc_code_of_the_bank' => '',
                                    'name_of_the_bank' => '',
                                    'account_number' => '',
                                    'use_this_for_refund' => '',
                                    ];
                                    @endphp

                                    @if(isset($itr_bank_details->bank_info))

                                    @forelse($bank_info->ifsc_code_of_the_bank as $ifsc_code_of_the_bank)
                                    @php

                                    $params['index'] = $loop->index;
                                    $params['ifsc_code_of_the_bank'] = $ifsc_code_of_the_bank;
                                    $params['name_of_the_bank'] = $bank_info->name_of_the_bank[$loop->index];
                                    $params['account_number'] = $bank_info->account_number[$loop->index];
                                    $params['use_this_for_refund'] = $bank_info->use_this_for_refund[$loop->index]??'';

                                    @endphp

                                    @include('tr.client.itr.template-parts.bank-details',$params)

                                    @empty

                                    @include('tr.client.itr.template-parts.bank-details',$params)

                                    @endforelse

                                    @else

                                    @include('tr.client.itr.template-parts.bank-details',$params)

                                    @endif

                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success btn-sm float-right" data-index="0"
                                            id="add-bank-info"> <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <h5>Aadhaar Details <span>(AADHAAR DETAILS ARE MANDATORY TO FILE THE ITR)</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="aadhar_info">
                                            <small>Aadhaar Card / Enrollment Number*</small>
                                        </label>
                                        <input type="text" class="form-control @error('aadhar_info') in-valid @enderror"
                                            name="aadhar_info"
                                            value="{{ $itr_bank_details->aadhar_info ?? old('aadhar_info')??'' }}">
                                        @error('aadhar_info')<span
                                            class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-deductions',['id' => $itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                                @if($id!='')
                                <a href="{{ route('tr/user/itr-prepaid-tax',['id' => $itr_sources_id]) }}"
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

    function add_bank_block(elem) {
        let action = 'bank_block_box';
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
                $(".bank-detail-box").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-bank-detail-box").on('click', function() {
                    $(this).parent().parent().remove();
                });
            }
        });
    }
    $("#add-bank-info").on('click', function() {
        add_bank_block($(this));
    });
    $(".remove-sec80d-block").on('click', function() {
        $(this).parent().parent().remove();
    });

})
</script>
@endsection