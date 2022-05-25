@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="container border margin-5b">
                <section class="step-indicator">
                    <div class="step step1 active">
                        <div class="step-icon">1</div>
                        <!-- <p>Source</p> -->
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step2">
                        <div class="step-icon">2</div>
                        <!-- <p>Personal</p> -->
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step3">
                        <div class="step-icon">3</div>
                        <!-- <p>Confirmation</p> -->
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step4">
                        <div class="step-icon">4</div>
                    </div>
                    <div class="indicator-line"></div>
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
                        <h5 class="page-title">Income Sources</h5>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-source/save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $itr_source->id ?? '' }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Select Income Sources: <sup>*</sup></label>
                                <?php $income_sources = isset($itr_source->income_sources) ? json_decode($itr_source->income_sources) : [];?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-check">
                                    <input type="checkbox"
                                        class="form-check-input income-source-checkbox @error('income_sources') is-invalid @enderror"
                                        name="income_sources[]" id="incomeSourceCheck1"
                                        value="Income from salary/pension" @if( in_array("Income from salary/pension",
                                        $income_sources) ) checked="true" @endif>
                                    @error('income_sources')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                    <label class="form-check-label income-source-checkbox-label"
                                        for="incomeSourceCheck1">Income from
                                        salary/pension</label>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input income-source-checkbox"
                                        name="income_sources[]" id="incomeSourceCheck2"
                                        value="Income from business/profession" @if( in_array("Income from
                                        business/profession", $income_sources) ) checked="true" @endif>
                                    <label class="form-check-label income-source-checkbox-label"
                                        for="incomeSourceCheck2">Income from
                                        business/profession</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input income-source-checkbox"
                                        name="income_sources[]" id="incomeSourceCheck3"
                                        value="Income from house property or home loan" @if( in_array("Income from house
                                        property or home loan", $income_sources) ) checked="true" @endif>
                                    <label class="form-check-label income-source-checkbox-label"
                                        for="incomeSourceCheck3">Income from house property
                                        or home loan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input income-source-checkbox"
                                        name="income_sources[]" id="incomeSourceCheck4"
                                        value="Income from other sources" @if( in_array("Income from other sources",
                                        $income_sources) ) checked="true" @endif>
                                    <label class="form-check-label income-source-checkbox-label"
                                        for="incomeSourceCheck4">Income from other
                                        sources</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input income-source-checkbox"
                                        name="income_sources[]" id="incomeSourceCheck5"
                                        value="Income from capital gains" @if( in_array("Income from capital gains",
                                        $income_sources) ) checked="true" @endif>
                                    <label class="form-check-label income-source-checkbox-label"
                                        for="incomeSourceCheck5">Income from capital
                                        gains</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input income-source-checkbox"
                                        name="income_sources[]" id="incomeSourceCheck6"
                                        value="Income from foreign source" @if( in_array("Income from foreign source",
                                        $income_sources) ) checked="true" @endif>
                                    <label class="form-check-label income-source-checkbox-label"
                                        for="incomeSourceCheck6">Income from foreign
                                        source</label>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix">&nbsp;</div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('Financial Year')}}<sup>*</sup></label>
                                    <select class="form-control @error('financial_year') is-invalid @enderror"
                                        name="financial_year" id="financial_year">
                                        <option value="">- Select -</option>
                                        @foreach($assesment_years as $assesment_year )
                                        <option value="{{ $assesment_year['year'] }}" @if( isset($itr_source->
                                            financial_year) &&
                                            ($itr_source->financial_year == $assesment_year['year']) )
                                            selected="selected" @endif
                                            >{{ $assesment_year['label'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('financial_year')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('PAN Number')}}<sup>*</sup></label>
                                    <input class="form-control @error('pan_number') is-invalid @enderror"
                                        name="pan_number"
                                        value="{{ $itr_source->pan_number ?? old('pan_number')??'' }}" />
                                    @error('pan_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{__('AADHAR Number')}}<sup>*</sup></label>
                                    <input class="form-control @error('aadhar_number') is-invalid @enderror"
                                        name="aadhar_number"
                                        value="{{ $itr_source->aadhar_number ?? old('aadhar_number')??'' }}" />
                                    @error('aadhar_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Upload form 16')}} <small>(Optional)</small> </label>
                                    <input type="file" class="form-control" name="form_16" />
                                    @error('form_16')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                @if(isset($itr_source->form_16) && ($itr_source->form_16!='') )
                                <div class="form-group">
                                    <a href="{{ route('/tr/user/itr-source/form-16', ['filename'=>$itr_source->form_16]) }}"
                                        class="btn btn-warning btn-lg" target="_blank">
                                        Download Form 16
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                                @if($itr_source)
                                <a href="{{ route('tr/user/itr-personal-details',['id'=> $itr_source->id ]) }}"
                                    class="btn btn-info px-5">Next</a>
                                @else
                                <a href="javascript:void(0)" class="btn btn-info px-5 disabled">Next</a>
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