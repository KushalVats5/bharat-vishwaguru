<div class="donation-box border padding-10 margin-bottom-15" data-index="{{$index}}">
    <div class="row">
        <div class="col-sm-8">
            <label for="name_of_donee"><small>Name of Donee</small></label>
            <input type="text" class="form-control @error('name_of_donee.*') is-invalid @enderror"
                name="name_of_donee[]" value="{{ $name_of_donee ?? old('name_of_donee.*')??'' }}">
            @error('name_of_donee.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-4">
            <label for="pan_of_donee"><small>PAN of Donee</small></label>
            <input type="text" class="form-control @error('pan_of_donee.*') is-invalid @enderror" name="pan_of_donee[]"
                value="{{ $pan_of_donee ?? old('pan_of_donee.*')??'' }}">
            @error('pan_of_donee.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

    </div>
    <div class="clear-fix">&nbsp;</div>
    <div class="row">
        <div class="col-sm-4">
            <label for="donation_in_cash"><small>Donation in Cash</small></label>
            <input type="text" class="form-control @error('donation_in_cash.*') is-invalid @enderror"
                name="donation_in_cash[]" value="{{ $donation_in_cash ?? old('donation_in_cash.*')??'0' }}">
            @error('donation_in_cash.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-4">
            <label for="donation_in_other_mode"><small>Donation in Other Mode</small></label>
            <input type="text" class="form-control @error('donation_in_other_mode.*') is-invalid @enderror"
                name="donation_in_other_mode[]"
                value="{{ $donation_in_other_mode ?? old('donation_in_other_mode.*')??'0' }}">
            @error('donation_in_other_mode.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-4">
            <label for="donation_amount"><small>Donation Amount</small></label>
            <input type="text" class="form-control @error('donation_amount.*') is-invalid @enderror"
                name="donation_amount[]" value="{{ $donation_amount ?? old('donation_amount.*')??'0' }}">
            @error('donation_amount.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

    </div>
    <div class="clear-fix">&nbsp;</div>
    <div class="row">
        <div class="col-sm-8">
            <label for="limit_of_deductions"><small>Limit of Deductions</small></label>
            <select name="limit_of_deductions[]"
                class="form-control @error('limit_of_deductions.*') is-invalid @enderror">
                <option value="">Please Select</option>
                <option value="Qualifying Limit" @if( isset($limit_of_deductions) &&
                    ($limit_of_deductions=='Qualifying Limit' ) ) selected="selected" @endif>Qualifying Limit</option>
                <option value="Without Qualifying Limit" @if( isset($limit_of_deductions) &&
                    ($limit_of_deductions=='Without Qualifying Limit' ) ) selected="selected" @endif>Without Qualifying
                    Limit</option>
            </select>
            @error('limit_of_deductions.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-4">
            <label>Percentage of Amount</label>
            <select name="donation_qualifying_percent[]"
                class="form-control @error('donation_qualifying_percent.*') is-invalid @enderror">
                <option value="">Please Select</option>
                <option value="50" @if( isset($donation_qualifying_percent) && ($donation_qualifying_percent=='50' ) )
                    selected="selected" @endif>50%</option>
                <option value="100" @if( isset($donation_qualifying_percent) && ($donation_qualifying_percent=='100' ) )
                    selected="selected" @endif>100%</option>
            </select>
            @error('donation_qualifying_percent.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="clear-fix">&nbsp;</div>

    <div class="row">
        <div class="col-sm-12">
            <h5>Donee Address</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label for="donee_pincode"><small>Pincode</small></label>
            <input type="text" class="form-control @error('donee_pincode.*') is-invalid @enderror"
                name="donee_pincode[]" value="{{ $donee_pincode ?? old('donee_pincode.*')??'' }}">
            @error('donee_pincode.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-4">
            <label for="donee_state"><small>State</small></label>
            <input type="text" class="form-control @error('donee_state.*') is-invalid @enderror" name="donee_state[]"
                value="{{ $donee_state ?? old('donee_state.*')??'' }}" />
            @error('donee_state.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-4">
            <label for="donee_city"><small>City</small></label>
            <input type="text" class="form-control @error('donee_city.*') is-invalid @enderror" name="donee_city[]"
                value="{{ $donee_city ?? old('donee_city.*')??'' }}" />
            @error('donee_city.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="clear-fix">&nbsp;</div>
    <div class="row">
        <div class="col-sm-11">
            <label for="donee_address"> <small> Address</small></label>
            <input type="text" class="form-control @error('donee_address.*') is-invalid @enderror"
                name="donee_address[]" value="{{ $donee_address ?? old('donee_address.*')??'' }}" />
            @error('donee_address.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="col-sm-1">
            @if($index>0)
            <p>&nbsp;</p>
            <button type="button" class="btn btn-danger btn-sm float-right remove-donation-box" data-index="{{$index}}">
                <i class="fa-solid fa-minus"></i>
            </button>
            @endif
        </div>
    </div>
    <div class="clear-fix">&nbsp;</div>
</div>