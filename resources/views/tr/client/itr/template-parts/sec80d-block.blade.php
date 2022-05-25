<div class="row margin-bottom-15 padding-10 border" data-index="{{$index}}">
    <div class="col-sm-6">
        <label for="sec80d_medical_insurance"><small>Medical Insurance</small></label>
        <select name="sec80d_medical_insurance[]"
            class="form-control @error('sec80d_medical_insurance.*') is-invalid @enderror">
            <option value="">Select Policy type</option>
            <option value="self" @if( isset($sec80d_medical_insurance) && ($sec80d_medical_insurance=='self' ) )
                selected="selected" @endif>For Self, Spouse and Dependent children</option>
            <option value="parent" @if( isset($sec80d_medical_insurance) && ($sec80d_medical_insurance=='parent' ) )
                selected="selected" @endif>For Parents</option>
        </select>
        @error('sec80d_medical_insurance.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    <div class="col-sm-5">

        <label for="sec80d_policy_holder_aged_60">
            <small>Is any of the policy holder aged 60 years or more?</small>
        </label>
        <input type="checkbox"
            class="form-control @error('sec80d_policy_holder_aged_60.*') is-invalid @enderror policy-hoder-aged-60"
            data-index="{{$index}}" name="sec80d_policy_holder_aged_60[]" value="1"
            @if($sec80d_policy_holder_aged_60==1) checked="checked" @endif>
        @error('sec80d_policy_holder_aged_60.*')<span class="invalid-feedback">{{ $message }}</span>@enderror

    </div>

    <div class="col-sm-1">
        @if($index>0)
        <p>&nbsp;</p>
        <button type="button" class="btn btn-danger btn-sm float-right remove-sec80d-block" data-index="{{$index}}">
            <i class="fa-solid fa-minus"></i>
        </button>
        @endif
    </div>

    <div class="col-sm-4">
        <label for="sec80d_health_checkup"><small>Preventive Health Check Up</small></label>
        <input type="text" class="form-control @error('sec80d_health_checkup.*') is-invalid @enderror"
            name="sec80d_health_checkup[]" value="{{ $sec80d_health_checkup ?? old('sec80d_health_checkup')??0 }}">
        @error('sec80d_health_checkup.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    <div
        class="col-sm-4 medical-expenditure-{{$index}} @if($sec80d_policy_holder_aged_60==1) d-block @else d-none @endif d-none">
        <label for="sec80d_medical_expenditure"><small>Medical Expenditure </small></label>
        <input type="text" class="form-control @error('sec80d_medical_expenditure.*') is-invalid @enderror"
            name="sec80d_medical_expenditure[]"
            value="{{ $sec80d_medical_expenditure ?? old('sec80d_medical_expenditure')??0 }}">
        @error('sec80d_medical_expenditure.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    <div class="col-sm-4">
        <label for="sec80d_medical_insurance_premium"><small>Medical insurance premium </small></label>
        <input type="text" class="form-control @error('sec80d_medical_insurance_premium.*') is-invalid @enderror"
            name="sec80d_medical_insurance_premium[]"
            value="{{ $sec80d_medical_insurance_premium ?? old('sec80d_medical_insurance_premium')??0 }}">
        @error('sec80d_medical_insurance_premium.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

</div>