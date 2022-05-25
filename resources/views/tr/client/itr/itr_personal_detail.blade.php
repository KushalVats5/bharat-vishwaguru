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
                    <div class="step step3">
                        <div class="step-icon">3</div>
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
                        <h5 class="page-title">Personal Details</h5>
                        <div class="heading-elements">
                            <!-- <a class="btn btn-danger btn-sm px-5" href="{{route('articles.index') }}">
                                <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                            </a> -->
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <hr />
                    <form action="{{ route('tr/user/itr-personal-details/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id ?? '' }}">
                        <input type="hidden" name="itr_sources_id" value="{{ $itr_sources_id ?? '' }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ $itr_personal_detail->first_name ?? old('first_name')??'' }}">
                                    @error('first_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control"
                                        value="{{ $itr_personal_detail->middle_name ?? old('middle_name')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ $itr_personal_detail->last_name ?? old('last_name')??'' }}">
                                    @error('last_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                        name="father_name"
                                        value="{{ $itr_personal_detail->father_name ?? old('father_name')??'' }}">
                                    @error('father_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth">Date Of Birth</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth"
                                        value="{{ $itr_personal_detail->date_of_birth ?? old('date_of_birth')??'' }}">
                                    @error('date_of_birth')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ $itr_personal_detail->phone ?? old('phone')??'' }}" />
                                    @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $itr_personal_detail->email ?? old('email')??'' }}" />
                                    @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option value=""> - Select - </option>
                                        <option value="male" @if((isset($itr_personal_detail->
                                            gender) && ($itr_personal_detail->gender == 'male')) || (old('gender') ==
                                            'male') ) selected = "selected" @endif>Male</option>
                                        <option value="female" @if((isset($itr_personal_detail->
                                            gender) && ($itr_personal_detail->gender == 'female')) || (old('gender') ==
                                            'female') ) selected = "selected" @endif>Female</option>
                                    </select>
                                    @error('gender')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="flat_door_building">Flat/Door/Building</label>
                                    <input type="text" name="flat_door_building"
                                        class="form-control @error('flat_door_building') is-invalid @enderror"
                                        value="{{ $itr_personal_detail->flat_door_building ?? old('flat_door_building')??'' }}">
                                    @error('flat_door_building')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="premises_building_village">Premises/Building/Village</label>
                                    <input type="text" name="premises_building_village" class="form-control"
                                        value="{{ $itr_personal_detail->premises_building_village ?? old('premises_building_village')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="road">Road</label>
                                    <input type="text" name="road" class="form-control"
                                        value="{{ $itr_personal_detail->road ?? old('road')??'' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="locality">Locality</label>
                                    <input type="text" name="locality" class="form-control"
                                        value="{{ $itr_personal_detail->locality ?? old('locality')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="101" selected="selected" @if((isset($itr_personal_detail->
                                            country) && ($itr_personal_detail->country == 101)) || (old('country') ==
                                            101) )
                                            selected = "selected" @endif>India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select name="state" id="state"
                                        class="form-control @error('state') is-invalid @enderror">
                                        <option value=""> - Select - </option>
                                        @foreach($states as $state )
                                        <option value="{{ $state->id }}" @if((isset($itr_personal_detail->
                                            state) && ($itr_personal_detail->state == $state->id)) || (old('state') ==
                                            $state->id) )
                                            selected = "selected" @endif >{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror">
                                        <option value=""> - Select - </option>
                                        @foreach($cities as $city )
                                        <option value="{{ $city->id }}" @if((isset($itr_personal_detail->
                                            city) && ($itr_personal_detail->city == $city->id)) || (old('city') ==
                                            $city->id) )
                                            selected = "selected" @endif >{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" name="pincode" class="form-control"
                                        value="{{ $itr_personal_detail->pincode ?? old('pincode')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="employee_category">Employee Category</label>
                                    <select name="employee_category" id="employee_category"
                                        class="form-control @error('employee_category') is-invalid @enderror">
                                        <option value=""> - Select - </option>
                                        <option value="central government" @if((isset($itr_personal_detail->
                                            employee_category) && ($itr_personal_detail->employee_category == 'central
                                            government')) || (old('employee_category') == 'central government') )
                                            selected = "selected" @endif >Central Government</option>
                                        <option value="public sector unit" @if((isset($itr_personal_detail->
                                            employee_category) && ($itr_personal_detail->employee_category == 'public
                                            sector unit')) || (old('employee_category') == 'public sector unit') )
                                            selected = "selected" @endif>Public Sector Unit</option>
                                        <option value="pensioner" @if((isset($itr_personal_detail->
                                            employee_category) && ($itr_personal_detail->employee_category ==
                                            'pensioner')) || (old('employee_category') == 'pensioner') )
                                            selected = "selected" @endif>Pensioner</option>
                                        <option value="private/others" @if((isset($itr_personal_detail->
                                            employee_category) && ($itr_personal_detail->employee_category ==
                                            'private/others')) || (old('employee_category') == 'private/others') )
                                            selected = "selected" @endif>Private/Others</option>
                                        <option value="not applicable" @if((isset($itr_personal_detail->
                                            employee_category) && ($itr_personal_detail->employee_category == 'not
                                            applicable')) || (old('employee_category') == 'not applicable') )
                                            selected = "selected" @endif>Not Applicable</option>
                                    </select>
                                    @error('employee_category')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>





                        <div class="clear-fix">&nbsp;</div>


                        <div class="row">

                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-source',['id' => $itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Save</button>
                                @if($itr_personal_detail)
                                <a href="{{ route('tr/user/itr-employment', ['id' => $itr_sources_id]) }}"
                                    class="btn btn-info  px-5">Next</a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-info  px-5 disabled">Next</a>
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
    $("#state").on('change', function() {
        let state_id = $(this).val();
        let elem_city = document.getElementById("city");
        /*remove existing options*/
        let length = elem_city.options.length;
        for (i = length - 1; i >= 0; i--) {
            elem_city.options[i] = null;
        }
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: user_ajax_url + "/get-cities",
            data: {
                state_id,
            },
            success: function(response) {
                console.log(response);
                if (response.cities) {
                    let default_option = document.createElement("option");
                    default_option.text = '--Select--';
                    default_option.value = '';
                    elem_city.add(default_option);

                    response.cities.forEach(function(item, index) {
                        let option = document.createElement("option");
                        option.text = item.name;
                        option.value = item.id;
                        elem_city.add(option);
                    });
                }
            }
        });




    })

})
</script>
@endsection