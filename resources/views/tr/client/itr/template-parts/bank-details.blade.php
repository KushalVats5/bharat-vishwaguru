<div class="row  margin-bottom-15 padding-10 border" data-index="{{$index}}">
    <div class="col-sm-3">
        <label for="ifsc_code_of_the_bank"><small>IFS Code of the Bank*</small></label>
        <input type="text" class="form-control @error('ifsc_code_of_the_bank.*') in-valid @enderror"
            name="ifsc_code_of_the_bank[]" value="{{ $ifsc_code_of_the_bank ?? old('ifsc_code_of_the_bank.*')??'' }}" />
        @error('ifsc_code_of_the_bank.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="col-sm-3">
        <label for="name_of_the_bank"><small>Name of the Bank *</small></label>
        <input type="text" class="form-control @error('name_of_the_bank.*') in-valid @enderror"
            name="name_of_the_bank[]" value="{{ $name_of_the_bank ?? old('name_of_the_bank.*')??'' }}" />
        @error('name_of_the_bank.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="col-sm-2">
        <label for="account_number"><small>Account Number *</small></label>
        <input type="text" class="form-control @error('account_number.*') in-valid @enderror" name="account_number[]"
            value="{{ $account_number ?? old('account_number.*')??'' }}" />
        @error('account_number.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="col-sm-3">
        <label class="radio-container @error('use_this_for_refund') in-valid @enderror">Use this for Refund
            <input type="radio" name="use_this_for_refund" value="index-{{$index}}" @if( isset($use_this_for_refund) &&
                ($use_this_for_refund=="index-{{$index}}" ) ) checked="checked" @endif>
            <span class="checkmark"></span>
        </label>
        @error('use_this_for_refund')<span class="invalid-feedback">{{ $message }}</span>@enderror

    </div>
    <div class="col-sm-1">
        @if($index>0)
        <p>&nbsp;</p>
        <button type="button" class="btn btn-danger btn-sm float-right remove-bank-detail-box" data-index="{{$index}}">
            <i class="fa-solid fa-minus"></i>
        </button>
        @endif
    </div>
</div>