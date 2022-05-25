<div class="card card-default margin-bottom-15" data-index="{{$index}}">
    <div class="card-header">Salary Details {{$index+1}}
        @if($index>1)
        <button type="button" class="close remove-salary-details" title="remove salary details" data-index="{{$index}}">
            <i class="fa-solid fa-trash-can"></i>
        </button>
        @endif
    </div>
    <div class="card-body">
        <label class="font-weight-bold">1. Gross Salary/CTC : </label>
        <div class="row">
            <div class="col-sm-3">
                <input type="hidden" name="salary_detail_id[]"
                    value="{{ $itr_employment_detail->id ?? old('salary_detail_id.'.$index)??'' }}">
                <label for="salary_income_annual"><small>Income
                        Annaul(Salary/Pension)<sup>*</sup></small>
                </label>
                <input type="text"
                    class="form-control money-decimal @error('salary_income_annual.*') is-invalid @enderror"
                    name="salary_income_annual[]"
                    value="{{ $itr_employment_detail->salary_income_annual ?? old('salary_income_annual.'.$index)??'0' }}"
                    id="salary_income_annual-{{$index}}">
                @error('salary_income_annual.*')<span class="invalid-feedback">{{ $message }}</span>@enderror

            </div>
            <div class="col-xs-1">
                <label for="">&nbsp;</label>
                <p class="text-center font-weight-bold p-2">+</p>
            </div>
            <div class="col-sm-3">
                <label for="value_of_perquisites"><small>Value of perquisites</small></label>
                <input type="text"
                    class="form-control money-decimal @error('value_of_perquisites.'.$index) is-invalid @enderror"
                    name="value_of_perquisites[]"
                    value="{{ $itr_employment_detail->value_of_perquisites ?? old('value_of_perquisites.'.$index)??'0' }}"
                    id="value_of_perquisites-{{$index}}">
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
                <input type="text" class="form-control @error('profit_in_lieu_of_salary.'.$index) is-invalid @enderror"
                    name="profit_in_lieu_of_salary[]"
                    value="{{ $itr_employment_detail->profit_in_lieu_of_salary ?? old('profit_in_lieu_of_salary.'.$index)??'0' }}"
                    id="profit_in_lieu_of_salary-{{$index}}">
                @error('profit_in_lieu_of_salary')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <label class="font-weight-bold">2. Less : Exempted Allowances</label>
        <div class="row">
            <div class="col-sm-3">
                <label for="house_rent_allowance"><small>House Rent Allowance</small></label>
                <input type="text" class="form-control @error('house_rent_allowance.'.$index) is-invalid @enderror"
                    name="house_rent_allowance[]" id="house_rent_allowance-{{$index}}"
                    value="{{ $itr_employment_detail->house_rent_allowance ?? old('house_rent_allowance.'.$index)??'0' }}">
                @error('house_rent_allowance')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-xs-1">
                <label for="">&nbsp;</label>
                <p class="text-center font-weight-bold p-2">+</p>
            </div>
            <div class="col-sm-3">
                <label for="leave_travel_concession"><small>Leave Travel
                        Concession/Assistance</small></label>
                <input type="text" class="form-control @error('leave_travel_concession.'.$index) is-invalid @enderror"
                    name="leave_travel_concession[]" id="leave_travel_concession-{{$index}}"
                    value="{{ $itr_employment_detail->leave_travel_concession ?? old('leave_travel_concession.'.$index)??'0' }}">
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
                <input type="text" class="form-control @error('gratuity.'.$index) is-invalid @enderror"
                    name="gratuity[]" id="gratuity-{{$index}}"
                    value="{{ $itr_employment_detail->gratuity ?? old('gratuity.'.$index)??'0' }}">
                @error('gratuity')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="other-allawance-box-{{$index}}" id="other-allawance-box">
            <div class="row">
                <div class="col-sm-12">
                    <h5>Add other allowances(if any): </h5>
                </div>
            </div>
            @php
            if($itr_employment_detail){
            $other_allowances = json_decode($itr_employment_detail->other_allowances);
            }else{
            $other_allowances = new \stdClass();
            $other_allowances->allowance_name = [];
            $other_allowances->allowance_amount = [];

            }
            @endphp

            @forelse($other_allowances->allowance_name as $other_allowance )
            @include('tr.client.itr.template-parts.other-allowances', ['index' => $loop->index,
            'allowance_name' => $other_allowance,
            'allowance_amount' => $other_allowances->allowance_amount[$loop->index], 'salary_box_index'=>$index])

            @empty
            @include('tr.client.itr.template-parts.other-allowances', ['index' => 0,
            'allowance_name' => '', 'allowance_amount' => '', 'salary_box_index'=>$index])
            @endforelse


        </div>

        <hr class="saperation-line">
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-success float-right add-other-allawances-{{$index}}"
                    id="add-other-allawances" data-index="0" data-sb-index="{{$index}}">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <label class="font-weight-bold">3. Net Salary (Gross Salary - Exempted Allowances) =
            <span id="net-salary-{{$index}}">0.00</span></label>
        <div class="clear-fix">&nbsp;</div>
        <label class="font-weight-bold">4. Less: Deductions u/s 16</label>

        <div class="row">
            <div class="col-sm-4">
                <label><small>Standard Deductions</small></label>
                <input type="text" class="form-control @error('standard_deduction.'.$index) is-invalid @enderror"
                    name="standard_deduction[]"
                    value="{{ $itr_employment_detail->standard_deduction ?? old('standard_deduction.'.$index)??'0' }}">
            </div>
            <div class="col-sm-4">
                <label><small>Entertainment Allowances</small></label>
                <input type="text" class="form-control @error('entertainment_allowance.'.$index) is-invalid @enderror"
                    name="entertainment_allowance[]"
                    value="{{ $itr_employment_detail->entertainment_allowance ?? old('entertainment_allowance.'.$index)??'0' }}">
            </div>
            <div class="col-sm-4">
                <label><small>Professional Tax</small></label>
                <input type="text" class="form-control @error('professional_tax.'.$index) is-invalid @enderror"
                    name="professional_tax[]"
                    value="{{ $itr_employment_detail->professional_tax ?? old('professional_tax.'.$index)??'0' }}">
            </div>
        </div>
        <div class="clear-fix">&nbsp;</div>
        <label class="font-weight-bold">Employer Details & TDS Deducted</label>
        <div class="row">
            <div class="col-sm-4">
                <label><small>Company / Employer Name</small></label>
                <input type="text" class="form-control @error('employer_name.*') is-invalid @enderror"
                    name="employer_name[]"
                    value="{{ $itr_employment_detail->employer_name ?? old('employer_name.'.$index)??'' }}">
                @error('employer_name.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-4">
                <label><small>TDS Deducted by Employer </small></label>
                <input type="text" class="form-control @error('tds_deduction.*') is-invalid @enderror"
                    name="tds_deduction[]"
                    value="{{ $itr_employment_detail->tds_deduction ?? old('tds_deduction.'.$index)??'0' }}">
                @error('tds_deduction.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-4">
                <label><small>TAN of the Employer </small></label>
                <input type="text" class="form-control @error('TAN_of_employer.*') is-invalid @enderror"
                    name="TAN_of_employer[]"
                    value="{{ $itr_employment_detail->TAN_of_employer ?? old('TAN_of_employer.'.$index)??'' }}">
                @error('TAN_of_employer.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function() {
    let salary_block_index = @php echo $index;
    @endphp;



    $("#salary_income_annual-" + salary_block_index + ", " + "#value_of_perquisites-" + salary_block_index +
        ", " + "#profit_in_lieu_of_salary-" + salary_block_index + ", " + "#house_rent_allowance-" +
        salary_block_index + ", " + "#leave_travel_concession-" + salary_block_index + ", " + "#gratuity-" +
        salary_block_index + ", " + ".allowance_amount-" + salary_block_index).on(
        'keyup',
        function() {
            let gross_income = $("#salary_income_annual-" + salary_block_index).val();
            let value_of_perquisites = $("#value_of_perquisites-" + salary_block_index).val();
            let profit_in_lieu_of_salary = $("#profit_in_lieu_of_salary-" + salary_block_index).val();
            let house_rent_allowance = $("#house_rent_allowance-" + salary_block_index).val();
            let leave_travel_concession = $("#leave_travel_concession-" + salary_block_index).val();
            let gratuity = $("#gratuity-" + salary_block_index).val();
            // other allowances
            let other_allowances = 0;
            $(".allowance_amount-" + salary_block_index).each(function() {
                other_allowances = parseFloat(other_allowances) + parseFloat($(this).val());
            })

            let net_salary = 0;
            net_salary = (parseFloat(gross_income) + parseFloat(value_of_perquisites) + parseFloat(
                profit_in_lieu_of_salary)) - (parseFloat(house_rent_allowance) + parseFloat(
                leave_travel_concession) + parseFloat(gratuity) + other_allowances);
            net_salary = net_salary.toFixed(2);
            $("#net-salary-" + salary_block_index).html(net_salary);

        });
    setTimeout(function() {
        $("#salary_income_annual-" + salary_block_index).keyup();
    }, 500);




})
</script>