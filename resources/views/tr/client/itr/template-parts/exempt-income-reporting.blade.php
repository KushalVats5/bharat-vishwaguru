<div class="row" data-index="{{$index}}">
    <div class="col-sm-6">
        <label for="value_of_perquisites"><small>Specify if any
                other</small></label>
        <select name="exempted_income_source[]" class="form-control">
            <option value="" selected="selected">Please Select</option>
            <option value="Agriculture Income (Rs. 5000) - AGRI" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Agriculture Income (Rs. 5000) - AGRI' )) selected="selected" @endif>
                Agriculture Income (Rs. 5000)
            </option>
            <option
                value="Any amount from the Central/State Govt./local authority by way of compensation on account of any disaster - 10(10BC)"
                @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Any amount from the Central/State Govt./local authority by way of compensation on account of any disaster - 10(10BC)'
                )) selected="selected" @endif>
                Any amount from the Central/State Govt./local authority by way of
                compensation on account of any disaster
            </option>
            <option value="Any sum received under a Life Insurance Policy - 10(10D)" @if(isset($exempted_income_source)
                && ($exempted_income_source=='Any sum received under a Life Insurance Policy - 10(10D)' ))
                selected="selected" @endif>
                Any sum received under a Life Insurance Policy
            </option>
            <option value="Statuory Provident Fund received - 10(11)" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Statuory Provident Fund received - 10(11)' )) selected="selected" @endif>
                Statuory Provident Fund received
            </option>
            <option value="Recognised Provident Fund received - 10(12)" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Recognised Provident Fund received - 10(12)' )) selected="selected" @endif>
                Recognised Provident Fund received
            </option>
            <option value="Approved superannuation fund received - 10(13)" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Approved superannuation fund received - 10(13)' )) selected="selected"
                @endif>
                Approved superannuation fund received
            </option>
            <option value="Scholarships received to meet the cost of education - 10(16)"
                @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Scholarships received to meet the cost of education - 10(16)' ))
                selected="selected" @endif>
                Scholarships received to meet the cost of education
            </option>
            <option value="Allowance MP/MLA/MLC - 10(17)" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Allowance MP/MLA/MLC - 10(17)' )) selected="selected" @endif>
                Allowance MP/MLA/MLC
            </option>
            <option value="Award instituted by Government - 10(17A)" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Award instituted by Government - 10(17A)' )) selected="selected" @endif>
                Award instituted by Government
            </option>
            <option
                value="Pension received by winner of 'Param Vir Chakra' or 'Maha Vir Chakra' or 'Vir Chakra' - 10(18)"
                @if(isset($exempted_income_source) &&
                ($exempted_income_source=="Pension received by winner of 'Param Vir Chakra' or 'Maha Vir Chakra' or 'Vir Chakra' - 10(18)"
                )) selected="selected" @endif>
                Pension received by winner of 'Param Vir Chakra' or 'Maha Vir
                Chakra' or
                'Vir Chakra'
            </option>
            <option value="Defense Medical Disability Pension - DMDP" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Defense Medical Disability Pension - DMDP' )) selected="selected" @endif>
                Defense Medical Disability Pension
            </option>
            <option value="Armed Forces Family pension in case of death during operational duty - 10(19)"
                @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Armed Forces Family pension in case of death during operational duty - 10(19)'
                )) selected="selected" @endif>
                Armed Forces Family pension in case of death during operational duty
            </option>
            <option value="Any income as referred to in section 10(26) - 10(26)" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Any income as referred to in section 10(26) - 10(26)' )) selected="selected"
                @endif>
                Any income as referred to in section 10(26)
            </option>
            <option value="Any income as referred to in section 10(26AAA) - 10(26AAA)"
                @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Any income as referred to in section 10(26AAA) - 10(26AAA)' ))
                selected="selected" @endif>
                Any income as referred to in section 10(26AAA)
            </option>
            <option value="Any Other - OTH" @if(isset($exempted_income_source) &&
                ($exempted_income_source=='Any Other - OTH' )) selected="selected" @endif>Any Other</option>
        </select>
    </div>
    <div class="col-sm-5">
        <label for="exempted_income_amount"><small>Amount</small></label>
        <input type="text" class="form-control" name="exempted_income_amount[]"
            value="{{ $exempted_income_amount ??'0' }}">

    </div>
    <div class="col-sm-1">
        @if($index>0)
        <p>&nbsp;</p>
        <button type="button" class="btn btn-danger btn-sm float-right remove-exempted-income-box"
            data-index="{{$index}}">
            <i class="fa-solid fa-minus"></i>
        </button>
        @endif
    </div>
</div>