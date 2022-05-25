<div class="row padding-10 margin-20 border" data-index="{{$index}}">
    <div class="col-sm-6">
        <label for="other_deduction_name"><small>Specify if any other</small></label>
        <select name="other_deduction_name[]"
            class="form-control @error('other_deduction_name.*') is-invalid @enderror">
            <option value="">Please Select</option>
            <option value="80ccc" @if( isset($other_deduction_name) && ($other_deduction_name=='80ccc' ) )
                selected="selected" @endif>80CCC</option>
            <option value="80ccd1" @if( isset($other_deduction_name) && ($other_deduction_name=='80ccd1' ) )
                selected="selected" @endif>80CCD(1) &amp; 80CCD(1B)</option>
            <option value="80ccd2" @if( isset($other_deduction_name) && ($other_deduction_name=='80ccd2' ) )
                selected="selected" @endif>80CCD(2) - Deposited by Employer</option>
            <option value="80ee" @if( isset($other_deduction_name) && ($other_deduction_name=='80ee' ) )
                selected="selected" @endif>80EE</option>
            <option value="80eea" @if( isset($other_deduction_name) && ($other_deduction_name=='80eea' ) )
                selected="selected" @endif>80EEA</option>
            <option value="80eeb" @if( isset($other_deduction_name) && ($other_deduction_name=='80eeb' ) )
                selected="selected" @endif>80EEB</option>
            <option value="80ggc" @if( isset($other_deduction_name) && ($other_deduction_name=='80ggc' ) )
                selected="selected" @endif>80GGC</option>
        </select>
        @error('other_deduction_name.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="col-sm-5">
        <label for="other_deduction_amount"><small>Amount</small></label>
        <input type="text" class="form-control @error('other_deduction_amount.*') is-invalid @enderror"
            name="other_deduction_amount[]"
            value="{{ $other_deduction_amount ?? old('other_deduction_amount.*')??'' }}">
        @error('other_deduction_amount.*')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="col-sm-1">
        @if($index>0)
        <p>&nbsp;</p>
        <button type="button" class="btn btn-danger btn-sm float-right remove-other-deduction" data-index="{{$index}}">
            <i class="fa-solid fa-minus"></i>
        </button>
        @endif
    </div>
</div>