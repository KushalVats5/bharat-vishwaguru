@extends('layouts.admin-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create Freelancer') }}</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('tr/admin/freelancer/save') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id??'' }}">
                        <div class="form-group row">
                            <strong>Personal Info.</strong>
                        </div>
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name ?? old('name') }}" required autocomplete="off"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="off">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="mobile" type="text"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ $user->mobile ?? old('mobile') }}" required autocomplete="off">

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob"
                                class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth(yyyy/mm/dd)') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" value="{{ $user->dob ?? old('dob') }}" required autocomplete="off">

                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="father_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Father Name') }}</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text"
                                    class="form-control @error('father_name') is-invalid @enderror" name="father_name"
                                    value="{{ $user->father_name ?? old('father_name') }}" required autocomplete="off">

                                @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aadharno"
                                class="col-md-4 col-form-label text-md-right">{{ __('Aadhar Number') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="aadharno" type="text"
                                    class="form-control @error('aadharno') is-invalid @enderror" name="aadharno"
                                    value="{{ $user->aadharno ?? old('aadharno') }}" required autocomplete="off">

                                @error('aadharno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pan"
                                class="col-md-4 col-form-label text-md-right">{{ __('PAN') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control @error('pan') is-invalid @enderror"
                                    name="pan" value="{{ $user->pan ?? old('pan') }}" required autocomplete="off">

                                @error('pan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualification"
                                class="col-md-4 col-form-label text-md-right">{{ __('Education Qualification') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <select name="qualification" id="qualification" class="form-control">
                                    <option value="">-Select-</option>
                                    <option value="ca" @if(isset($user->qualification) and
                                        $user->qualification=='ca' )
                                        selected="selected" @endif >CA</option>
                                    <option value="cma" @if(isset($user->qualification) and
                                        $user->qualification=='cma' )
                                        selected="selected" @endif >CMA</option>
                                    <option value="advocate" @if(isset($user->qualification) and
                                        $user->qualification=='advocate' )
                                        selected="selected" @endif >Advocate</option>
                                    <option value="mba" @if(isset($user->qualification) and
                                        $user->qualification=='mba' )
                                        selected="selected" @endif >MBA</option>
                                    <option value="graduation" @if(isset($user->qualification) and
                                        $user->qualification=='graduation' )
                                        selected="selected" @endif >Graduation</option>
                                    <option value="other" @if(isset($user->qualification) and
                                        $user->qualification=='other' )
                                        selected="selected" @endif >Other</option>
                                </select>

                                @error('qualification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <strong>Bank A/c Info.</strong>
                        </div>
                        @php
                        $bank_details = json_decode($user->bank);
                        @endphp
                        <div class="form-group row">
                            <label for="bank"
                                class="col-md-4 col-form-label text-md-right">{{ __('Bank A/c No.') }}</label>

                            <div class="col-md-6">
                                {{ $bank_details->account_no??'n/a' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank"
                                class="col-md-4 col-form-label text-md-right">{{ __('Bank IFSC Code') }}</label>

                            <div class="col-md-6">
                                {{ $bank_details->ifsc??'n/a' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <strong>Address</strong>
                        </div>
                        <div class="form-group row">
                            <label for="flat"
                                class="col-md-4 col-form-label text-md-right">{{ __('Flat/Door No.') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="flat" type="text" class="form-control @error('flat') is-invalid @enderror"
                                    name="flat" value="{{ $user->flat ?? old('flat') }}" required autocomplete="off">

                                @error('flat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="road_no"
                                class="col-md-4 col-form-label text-md-right">{{ __('Road/Street') }}</label>

                            <div class="col-md-6">
                                <input id="road_no" type="text"
                                    class="form-control @error('road_no') is-invalid @enderror" name="road_no"
                                    value="{{ $user->road_no ?? old('road_no') }}" required autocomplete="off">

                                @error('road_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area"
                                class="col-md-4 col-form-label text-md-right">{{ __('Area/Locality') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror"
                                    name="area" value="{{ $user->area ?? old('area') }}" required autocomplete="off">

                                @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="distic"
                                class="col-md-4 col-form-label text-md-right">{{ __('District/City') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="distic" type="text"
                                    class="form-control @error('distic') is-invalid @enderror" name="distic"
                                    value="{{ $user->distic ?? old('distic') }}" required autocomplete="off">

                                @error('distic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state"
                                class="col-md-4 col-form-label text-md-right">{{ __('State') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                                    name="state" value="{{ $user->state ?? old('state') }}" required autocomplete="off">

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pincode"
                                class="col-md-4 col-form-label text-md-right">{{ __('Pincode') }}<sup>*</sup></label>

                            <div class="col-md-6">
                                <input id="pincode" type="text"
                                    class="form-control @error('pincode') is-invalid @enderror" name="pincode"
                                    value="{{ $user->pincode ?? old('pincode') }}" required autocomplete="off">

                                @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <strong>Certificates/Diploma/Degree/Documents</strong>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('Aadhar') }}</label>

                            <div class="col-md-6">
                                <a href="{{ url('uploads/'.$user->aadhar) }}" target="_blank"
                                    class="btn btn-primary">Download
                                    Aadhar</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('PAN Card') }}</label>

                            <div class="col-md-6">
                                <a href="{{ url('uploads/'.$user->pancard) }}" target="_blank"
                                    class="btn btn-primary">Download Pan Card</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank"
                                class="col-md-4 col-form-label text-md-right">{{ __('Cancelled Cheque') }}</label>

                            <div class="col-md-6">
                                <a href="{{ url('uploads/'.$user->cancel_cheque) }}" target="_blank"
                                    class="btn btn-primary">Download Cancelled Cheque</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank"
                                class="col-md-4 col-form-label text-md-right">{{ __('Education Certificate/Degree') }}</label>

                            <div class="col-md-6">
                                <a href="{{ url('uploads/'.$user->education_certificate) }}" target="_blank"
                                    class="btn btn-primary">Download Education Certificate/Degree</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

                            <div class="col-md-6">
                                <a href="{{ url('uploads/'.$user->resume) }}" target="_blank"
                                    class="btn btn-primary">Download Resume</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <strong>Status</strong>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>
                            <div class="col-md-6">
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="">-Select-</option>
                                    <option value="1" @if(isset($user->is_active) and $user->is_active==1 )
                                        selected="selected" @endif >Active</option>
                                    <option value="0" @if(isset($user->is_active) and $user->is_active==0 )
                                        selected="selected" @endif >Deactive</option>
                                </select>

                                @error('is_active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <strong>Avalaibility</strong>
                        </div>
                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Available') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <select name="availability" id="availability"
                                    class="form-control @error('availability') is-invalid @enderror">
                                    <option value="Available" @if(isset($user->available->availability) and
                                        $user->available->availability=='Available' )
                                        selected="selected" @endif >Available</option>
                                    <option value="Busy" @if(isset($user->available->availability) and
                                        $user->available->availability=='Busy' )
                                        selected="selected" @endif>Busy</option>
                                    <option value="Not Available" @if(isset($user->available->availability) and
                                        $user->available->availability=='Not Available' )
                                        selected="selected" @endif>Not Available</option>
                                    <option value="Away" @if(isset($user->available->availability) and
                                        $user->available->availability=='Away' )
                                        selected="selected" @endif>Away</option>
                                </select>
                                @error('availability')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mon_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Monday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="mon_hours" type="number"
                                    class="form-control @error('mon_hours') is-invalid @enderror" name="mon_hours"
                                    value="{{ $user->available->mon_hours ?? old('mon_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('mon_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tue_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tuesday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="tue_hours" type="number"
                                    class="form-control @error('tue_hours') is-invalid @enderror" name="tue_hours"
                                    value="{{ $user->available->tue_hours ?? old('tue_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('tue_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wed_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Wednesday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="wed_hours" type="number"
                                    class="form-control @error('wed_hours') is-invalid @enderror" name="wed_hours"
                                    value="{{ $user->available->wed_hours ?? old('wed_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('wed_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="thu_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Thurseday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="thu_hours" type="number"
                                    class="form-control @error('thu_hours') is-invalid @enderror" name="thu_hours"
                                    value="{{ $user->available->thu_hours ?? old('thu_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('thu_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fri_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Friday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="fri_hours" type="number"
                                    class="form-control @error('fri_hours') is-invalid @enderror" name="fri_hours"
                                    value="{{ $user->available->fri_hours ?? old('fri_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('fri_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sat_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Saturday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="sat_hours" type="number"
                                    class="form-control @error('sat_hours') is-invalid @enderror" name="sat_hours"
                                    value="{{ $user->available->sat_hours ?? old('sat_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('sat_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sun_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Sunday Hours') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <input id="sun_hours" type="number"
                                    class="form-control @error('sun_hours') is-invalid @enderror" name="sun_hours"
                                    value="{{ $user->available->sun_hours ?? old('sun_hours')??0 }}" required
                                    autocomplete="off" autofocus>

                                @error('sun_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sun_hours"
                                class="col-md-4 col-form-label text-md-right">{{ __('Notes (If Any)') }}<sup>*</sup></label>
                            <div class="col-md-6">
                                <textarea name="notes" id="notes"
                                    class="form-control @error('notes') is-invalid @enderror" cols="30"
                                    rows="5">{{ $user->available->notes ?? old('notes') }}</textarea>
                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection