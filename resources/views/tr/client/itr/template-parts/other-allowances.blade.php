<div class="row padding-bottom-20 margin-bottom-15 border" data-row-index="{{$index}}">
    <div class="col-sm-8">
        <label for="allowance_name"><small>Specify Any Other</small></label>
        <select class="form-control" name="allowance_name[{{$salary_box_index}}][]">
            <option value="" selected="selected">Please Select</option>
            <option value="Remuneration received as an official of an embassy, high commission etc. - 10(6)"
                @if(isset($allowance_amount) &&
                ($allowance_name=='Remuneration received as an official of an embassy, high commission etc. - 10(6)' ))
                selected="selected" @endif>
                Remuneration received as an official of an embassy, high commission etc.
            </option>
            <option
                value="Allowances or perquisites paid outside India by the Government for rendering service outside India - 10(7)"
                @if(isset($allowance_amount) &&
                ($allowance_name=='Allowances or perquisites paid outside India by the Government for rendering service outside India - 10(7)'
                )) selected="selected" @endif>
                Allowances or perquisites paid outside India by the Government for rendering service outside India
            </option>
            <option value="Pension - 10(10A)" @if(isset($allowance_amount) && ($allowance_name=='Pension - 10(10A)' ))
                selected="selected" @endif>
                Pension
            </option>
            <option value="Leave encashment on Retirement - 10(10AA)" @if(isset($allowance_amount) &&
                ($allowance_name=='Leave encashment on Retirement - 10(10AA)' )) selected="selected" @endif>
                Leave encashment on Retirement
            </option>
            <option value="Compensation limit notified by CG in the Official Gazette - 10(10B)(i)"
                @if(isset($allowance_amount) &&
                ($allowance_name=='Compensation limit notified by CG in the Official Gazette - 10(10B)(i)' ))
                selected="selected" @endif>
                Compensation limit notified by CG in the Official Gazette
            </option>
            <option value="Compensation under scheme approved by the Central Government - 10(10B)(ii)"
                @if(isset($allowance_amount) &&
                ($allowance_name=='Compensation under scheme approved by the Central Government - 10(10B)(ii)' ))
                selected="selected" @endif>
                Compensation under scheme approved by the Central Government
            </option>
            <option value="Amount received on voluntary retirement - 10(10C)" @if(isset($allowance_amount) &&
                ($allowance_name=='Amount received on voluntary retirement - 10(10C)' )) selected="selected" @endif>
                Amount received on voluntary retirement
            </option>
            <option value="Tax paid by employer on non-monetary perquisite - 10(10CC)" @if(isset($allowance_amount) &&
                ($allowance_name=='Tax paid by employer on non-monetary perquisite - 10(10CC)' )) selected="selected"
                @endif>
                Tax paid by employer on non-monetary perquisite
            </option>
            <option
                value="Prescribed Allowances or benefits specifically granted to meet expenses in performance of duties of office or employment - 10(14)(i)"
                @if(isset($allowance_amount) &&
                ($allowance_name=='Prescribed Allowances or benefits specifically granted to meet expenses in performance of duties of office or employment - 10(14)(i)'
                )) selected="selected" @endif>
                Prescribed Allowances or benefits specifically granted to meet expenses in performance of duties of
                office or employment
            </option>
            <option
                value="Prescribed Allowances or benefits granted to meet personal expenses in performance of duties - 10(14)(ii)"
                @if(isset($allowance_amount) &&
                ($allowance_name=='Prescribed Allowances or benefits granted to meet personal expenses in performance of duties - 10(14)(ii)'
                )) selected="selected" @endif>
                Prescribed Allowances or benefits granted to meet personal expenses in performance of duties
            </option>
            <option value="Any Other - OTH" @if(isset($allowance_amount) && ($allowance_name=='Any Other - OTH' ))
                selected="selected" @endif>
                Any Other
            </option>
        </select>
    </div>
    <div class="col-sm-3">

        <label for="allowance_amount"><small>Amount</small></label>
        <input type="text" class="form-control allowance_amount-{{$salary_box_index}}"
            name="allowance_amount[{{$salary_box_index}}][]" value="{{ $allowance_amount??0 }}">
    </div>
    <div class="col-sm-1">
        @if($index>0)
        <p>&nbsp;</p>
        <button type="button" class="btn btn-danger btn-sm float-right remove-other-allawances" data-index="{{$index}}">
            <i class="fa-solid fa-minus"></i>
        </button>
        @endif
    </div>
</div>

{{--

<div class="card card-default margin-bottom-15" data-index="1">
                                <div class="card-header">Salary Details 1</div>
                                <div class="card-body">

                                    <label class="font-weight-bold">1. Gross Salary/CTC : </label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="salary_income_annual"><small>Income
                                                    Annaul(Salary/Pension)<sup>*</sup></small>
                                            </label>
                                            <input type="text"
                                                class="form-control money-decimal @error('salary_income_annual') is-invalid @enderror"
                                                name="salary_income_annual"
                                                value="{{ $itr_employment_details->salary_income_annual ?? old('salary_income_annual')??'0' }}">
@error('salary_income_annual')<span class="invalid-feedback">{{ $message }}</span>@enderror

</div>
<div class="col-xs-1">
    <label for="">&nbsp;</label>
    <p class="text-center font-weight-bold p-2">+</p>
</div>
<div class="col-sm-3">
    <label for="value_of_perquisites"><small>Value of
            perquisites</small></label>
    <input type="text" class="form-control money-decimal @error('value_of_perquisites') is-invalid @enderror"
        name="value_of_perquisites"
        value="{{ $itr_employment_details->value_of_perquisites ?? old('value_of_perquisites')??'0' }}">
    @error('value_of_perquisites')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="col-xs-1">
    <label for="">&nbsp;</label>
    <p class="text-center font-weight-bold p-2">+</p>
</div>
<div class="col-sm-3">
    <label for="profit_in_lieu_of_salary"><small>Profit in lieu of
            salary</small></label>
    <input type="text" class="form-control @error('profit_in_lieu_of_salary') is-invalid @enderror"
        name="profit_in_lieu_of_salary"
        value="{{ $itr_employment_details->profit_in_lieu_of_salary ?? old('profit_in_lieu_of_salary')??'0' }}">
    @error('profit_in_lieu_of_salary')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
</div>
<hr>
<label class="font-weight-bold">2. Less : Exempted Allowances</label>
<div class="row">
    <div class="col-sm-3">
        <label for="salary_income_annual"><small>House Rent
                Allowance</small></label>
        <input type="text" class="form-control @error('house_rent_allowance') is-invalid @enderror"
            name="house_rent_allowance"
            value="{{ $itr_employment_details->house_rent_allowance ?? old('house_rent_allowance')??'0' }}">
        @error('house_rent_allowance')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-xs-1">
        <label for="">&nbsp;</label>
        <p class="text-center font-weight-bold p-2">+</p>
    </div>
    <div class="col-sm-3">
        <label for="value_of_perquisites"><small>Leave Travel
                Concession/Assistance</small></label>
        <input type="text" class="form-control @error('leave_travel_concession') is-invalid @enderror"
            name="leave_travel_concession"
            value="{{ $itr_employment_details->leave_travel_concession ?? old('leave_travel_concession')??'0' }}">
        @error('leave_travel_concession')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-xs-1">
        <label for="">&nbsp;</label>
        <p class="text-center font-weight-bold p-2">+</p>
    </div>
    <div class="col-sm-3">
        <label for="gratuity"><small>Gratuity</small></label>
        <input type="text" class="form-control @error('gratuity') is-invalid @enderror" name="gratuity"
            value="{{ $itr_employment_details->gratuity ?? old('gratuity')??'0' }}">
        @error('gratuity')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="other-allawance-box-1" id="other-allawance-box">
    <div class="row">
        <div class="col-sm-12">
            <h5>Add other allowances(if any): </h5>
        </div>
    </div>
    <div class="row padding-bottom-20 margin-bottom-15 border" data-row-index="1">
        <div class="col-sm-8">
            <label for="allowance_name"><small>Specify Any Other</small></label>
            <select name="" class="form-control" name="allowance_name[]">
                <option value="">Please Select</option>
                <option value="Remuneration received as an official of an embassy,
                                                high commission etc. - 10(6)">Remuneration received as an official of
                    an embassy,
                    high commission etc.</option>
                <option value="Allowances or perquisites paid outside India by the
                                                Government for rendering service outside India - 10(7)">Allowances or
                    perquisites paid outside India by the
                    Government for rendering service outside India</option>
                <option value="Pension - 10(10A)">Pension</option>
                <option value="Leave encashment on Retirement - 10(10AA)">Leave
                    encashment
                    on Retirement</option>
                <option value="Compensation limit notified by CG in the Official
                                                Gazette - 10(10B)(i)">Compensation limit notified by CG in the Official
                    Gazette</option>
                <option value="Compensation under scheme approved by the
                                                Central Government - 10(10B)(ii)">Compensation under scheme approved by
                    the
                    Central Government</option>
                <option value="Amount received on voluntary retirement - 10(10C)">
                    Amount
                    received on voluntary retirement</option>
                <option value="Tax paid by employer on non-monetary perquisite - 10(10CC)">
                    Tax paid by employer on non-monetary perquisite
                </option>
                <option value="Prescribed Allowances or benefits specifically
                                                granted to meet expenses in performance of duties of office or
                                                employment - 10(14)(i)">Prescribed Allowances or benefits specifically
                    granted to meet expenses in performance of duties of office or
                    employment</option>
                <option value="Prescribed Allowances or benefits granted to meet
                                                personal expenses in performance of duties - 10(14)(ii)">Prescribed
                    Allowances or benefits granted to meet
                    personal expenses in performance of duties</option>
                <option value="Any Other - OTH">Any Other</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label for="allowance_amount"><small>Amount</small></label>
            <input type="text" class="form-control" name="allowance_amount[]">
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

<hr class="saperation-line">
<div class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-success float-right add-other-allawances-1" id="add-other-allawances"
            data-index="1" data-sb-index="1">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>
<label class="font-weight-bold">3. Net Salary (Gross Salary - Exempted Allowances) =
    4,58,000</label>
<div class="clear-fix">&nbsp;</div>
<label class="font-weight-bold">4. Less: Deductions u/s 16</label>
<div class="row">
    <div class="col-sm-4">
        <label><small>Standard Deductions</small></label>
        <input type="text" class="form-control" name="profit_in_lieu_of_salary">
    </div>
    <div class="col-sm-4">
        <label><small>Entertainment Allowances</small></label>
        <input type="text" class="form-control" name="profit_in_lieu_of_salary">
    </div>
    <div class="col-sm-4">
        <label><small>Professional Tax</small></label>
        <input type="text" class="form-control" name="profit_in_lieu_of_salary">
    </div>
</div>
<div class="clear-fix">&nbsp;</div>
<label class="font-weight-bold">Employer Details & TDS Deducted</label>
<div class="row">
    <div class="col-sm-4">
        <label><small>Company / Employer Name</small></label>
        <input type="text" class="form-control" name="profit_in_lieu_of_salary">
    </div>
    <div class="col-sm-4">
        <label><small>TDS Deducted by Employer </small></label>
        <input type="text" class="form-control" name="profit_in_lieu_of_salary">
    </div>
    <div class="col-sm-4">
        <label><small>TAN of the Employer </small></label>
        <input type="text" class="form-control" name="profit_in_lieu_of_salary">
    </div>
</div>
</div>



</div><!-- end card -->


--}}