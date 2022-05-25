@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix content-center">

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">&nbsp;</div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="page-title">GST Return File</h5>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <hr />
                    <form action="{{ route('tr/user/gst-return-file/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $gst_info->id ?? '' }}">

                        @if(!isset($gst_info->id))
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Find A GST Package Suitable For You Below</h6>
                            </div>
                        </div>
                        <div class="row">
                            @php
                            $bg_classes = ['text-white bg-primary','text-white bg-warning','text-white bg-success'];
                            @endphp
                            @foreach($service_plans as $service_plan )
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header {{ $bg_classes[$loop->index]??'' }}">
                                        <h5 class="card-title">{{$service_plan->title}}</h5>
                                    </div>
                                    <div class="card-body">

                                        <p class="card-text">{{$service_plan->description}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Duration: {{$service_plan->duration}}
                                            {{$service_plan->duration_unit}}</li>
                                        <li class="list-group-item">Price: Rs.{{$service_plan->price}}</li>
                                        <li class="list-group-item">
                                            <label class="radio-container">
                                                Select
                                                <input type="radio" name="service_plan" class="service_plan"
                                                    value="{{ $service_plan->id }}" data-plan="{{$service_plan}}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            <div id="plan-info"></div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Business Details</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="gst_no">GST Number</label>
                                    <input class="form-control @error('gst_no') is-invalid @enderror" name="gst_no"
                                        value="{{ $gst_info->gst_no ?? old('gst_no')??'' }}" />
                                    @error('gst_no')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="firm_name">Name of Firm</label>
                                    <input class="form-control @error('firm_name') is-invalid @enderror"
                                        name="firm_name" value="{{ $gst_info->firm_name ?? old('firm_name')??'' }}" />
                                    @error('firm_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="owner_name">Name of Owner</label>
                                    <input class="form-control @error('owner_name') is-invalid @enderror"
                                        name="owner_name"
                                        value="{{ $gst_info->owner_name ?? old('owner_name')??'' }}" />
                                    @error('owner_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="gst_username">GST Username</label>
                                    <input class="form-control @error('gst_username') is-invalid @enderror"
                                        name="gst_username"
                                        value="{{ $gst_info->gst_username ?? old('gst_username')??'' }}" />
                                    @error('gst_username')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="gst_passcode">GST Password</label>
                                    <input class="form-control @error('gst_passcode') is-invalid @enderror"
                                        name="gst_passcode"
                                        value="{{ $gst_info->gst_passcode ?? old('gst_passcode')??'' }}" />
                                    @error('gst_passcode')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Business Address</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="flat_no">Flat No/House No.</label>
                                    <input class="form-control @error('flat_no') is-invalid @enderror" name="flat_no"
                                        value="{{ $gst_info->flat_no ?? old('flat_no')??'' }}" />
                                    @error('flat_no')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="premises">Name of Premises/Building/Village</label>
                                    <input class="form-control @error('premises') is-invalid @enderror" name="premises"
                                        value="{{ $gst_info->premises ?? old('premises')??'' }}" />
                                    @error('premises')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="street">Road/Stree/Post Office</label>
                                    <input class="form-control @error('street') is-invalid @enderror" name="street"
                                        value="{{ $gst_info->street ?? old('street')??'' }}" />
                                    @error('street')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="locality">Area/Locality</label>
                                    <input class="form-control @error('locality') is-invalid @enderror" name="locality"
                                        value="{{ $gst_info->locality ?? old('locality')??'' }}" />
                                    @error('locality')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select name="state" id="state"
                                        class="form-control @error('state') is-invalid @enderror">
                                        <option value=""> - Select - </option>
                                        @foreach($states as $state )
                                        <option value="{{ $state->id }}" @if((isset($gst_info->
                                            state) && ($gst_info->state == $state->id)) || (old('state') ==
                                            $state->id) )
                                            selected = "selected" @endif >{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="city">Town/City/District</label>
                                    <select name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror">
                                        <option value=""> - Select - </option>
                                        @foreach($cities as $city )
                                        <option value="{{ $city->id }}" @if((isset($gst_info->
                                            city) && ($gst_info->city == $city->id)) || (old('city') ==
                                            $city->id) )
                                            selected = "selected" @endif >{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="zipcode">Zipcode</label>
                                    <input class="form-control @error('zipcode') is-invalid @enderror" type="text"
                                        name="zipcode" value="{{ $gst_info->zipcode ?? old('zipcode')??'' }}" />
                                    @error('zipcode')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email_id">Email</label>
                                    <input class="form-control @error('email_id') is-invalid @enderror" name="email_id"
                                        value="{{ $gst_info->email_id ?? old('email_id')??'' }}" />
                                    @error('email_id')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="phone_no">Phone No.</label>
                                    <input class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                        value="{{ $gst_info->phone_no ?? old('phone_no')??'' }}" />
                                    @error('phone_no')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Bank Details(Firm/Company)</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bank_ac_number">Bank A/c Number</label>
                                    <input class="form-control @error('bank_ac_number') is-invalid @enderror"
                                        name="bank_ac_number"
                                        value="{{ $gst_info->bank_ac_number ?? old('bank_ac_number')??'' }}" />
                                    @error('bank_ac_number')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bank_ifsc">Bank IFSC </label>
                                    <input class="form-control @error('bank_ifsc') is-invalid @enderror"
                                        name="bank_ifsc" value="{{ $gst_info->bank_ifsc ?? old('bank_ifsc')??'' }}" />
                                    @error('bank_ifsc')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input class="form-control @error('bank_name') is-invalid @enderror"
                                        name="bank_name" value="{{ $gst_info->bank_name ?? old('bank_name')??'' }}" />
                                    @error('bank_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>


                        @if(!isset($gst_info->id))
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>GST Filing Period</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bank_name">Financial Year</label>
                                    <select name="financial_year" id="financial_year" class="form-control">
                                        <option value="">- Select -</option>
                                        @foreach($assesment_years as $assesment_year )
                                        <option value="{{ $assesment_year }}">
                                            {{ $assesment_year }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('financial_year')<span
                                        class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="quarter">Quarter</label>
                                    <select name="quarter" id="quarter" class="form-control">
                                        <option value="">-Select-</option>
                                        <option value="Quarter1" data-months="Apr,May,Jun">Quarter 1 (Apr-Jun)
                                        </option>
                                        <option value="Quarter2" data-months="Jul,Aug,Sep">Quarter 2 (Jul-Sep)
                                        </option>
                                        <option value="Quarter3" data-months="Oct,Nov,Dec">Quarter 3 (Oct-Dec)
                                        </option>
                                        <option value="Quarter4" data-months="Jan,Feb,Mar">Quarter 4 (Jan-Mar)
                                        </option>
                                    </select>
                                    @error('quarter')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="return_to_be_file">Return To Be File</label>
                                    <select name="return_to_be_file" id="return_to_be_file" class="form-control">
                                        <option value="">-Select-</option>
                                    </select>
                                    @error('return_to_be_file')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bank_name">Valadity Of Package</label>
                                    <div class="alert alert-warning" id="package-validity"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success text-center" id="payment_amount"></div>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>GST Filing Latest Subscribed Plan</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Plan Title</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $service_subscription->service_plan->title }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <p>Plan Duration</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $service_subscription->plan_duration }}
                                    {{ $service_subscription->plan_duration_unit }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Financial Year</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $service_subscription->financial_year }} -
                                    {{ $service_subscription->financial_year_quarter }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Return Filing Start From </p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $service_subscription->retrun_to_be_file_from }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Amount</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Rs.{{ $service_subscription->amount }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Payment Status</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $service_subscription->payment_status }}</p>
                            </div>
                        </div>
                        @endif



                        <div class="row">
                            <div class="col-md-12 text-right">
                                @if(!isset($gst_info->id))
                                <button type="submit" class="btn btn-primary  px-5">Save & Pay</button>
                                @else
                                <button type="submit" class="btn btn-primary  px-5">Update</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">&nbsp;</div>
    </div>
    <!-- #END# Vertical Layout -->

</div>
@endsection
@section('script')
<script>
$(document).ready(function() {

    ///$("#service_plan").on('change', function() {
    $(".service_plan").on('click', function() {
        //let data_plan = $(this).find(':selected').attr('data-plan');
        let data_plan = $(this).attr('data-plan');
        data_plan = JSON.parse(data_plan);
        //$("#plan-info").html('<div class="alert alert-success">' + data_plan.description + '</div>');
        $("#payment_amount").html('<strong>₹' + data_plan.price + '</strong>');
        $(".service_plan").each(function() {
            $(this).parent().parent().parent().parent().removeClass('border border-danger');
        })
        $(this).parent().parent().parent().parent().addClass('border border-danger');
    });

    $("#quarter").on('change', function() {
        let data_quarter = $(this).val();
        let data_months = $(this).find(':selected').attr('data-months');
        let return_to_be_file = document.getElementById("return_to_be_file");
        /*remove existing options*/
        let length = return_to_be_file.options.length;
        for (i = length - 1; i >= 0; i--) {
            return_to_be_file.options[i] = null;
        }
        let q_months = ['Select'];

        switch (data_quarter) {
            case 'Quarter1':
                q_months = ['Apr', 'May', 'Jun'];
                break;
            case 'Quarter2':
                q_months = ['Jul', 'Aug', 'Sep'];
                break;
            case 'Quarter3':
                q_months = ['Oct', 'Nov', 'Dec'];
                break;
            case 'Quarter4':
                q_months = ['Jan', 'Feb', 'Mar'];
                break;
            default:
                break;
        }

        let default_option = document.createElement("option");
        default_option.text = '--Select--';
        default_option.value = '';
        return_to_be_file.add(default_option);

        q_months.forEach(function(item, index) {
            let option = document.createElement("option");
            option.text = item;
            option.value = item;
            return_to_be_file.add(option);
        });

        $("#return_to_be_file").on('change', function() {
            //console.log('yup..');
            show_plan_info($(this));
        });
    });
    $("#return_to_be_file").on('change', function() {
        show_plan_info($(this));
    });

    function show_plan_info(elem) {
        //alert('yup.. I exist...');
        //let data_plan = $("#service_plan").find(':selected').attr('data-plan');
        //let data_plan = $(".service_plan").find(':checked').attr('data-plan');
        let data_plan = $("input[name='service_plan']:checked").attr('data-plan');
        let financial_year = $("#financial_year").find(':selected').val();
        data_plan = JSON.parse(data_plan);
        let selected_month = elem.val();
        let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
            'Dec'
        ];

        //console.log('data_plan:', data_plan);
        let month_index;
        switch (data_plan.duration_unit) {
            case 'month(s)':
                month_index = $.inArray(selected_month, months);
                //console.log('Found Index:', month_index);
                if (month_index != -1) {
                    last_index = (month_index + data_plan.duration);
                    console.log('new index', month_index, data_plan.duration);
                    if (last_index > 12) {
                        last_index = (last_index - 12);
                    }
                    last_index = (last_index - 1);
                    //console.log('month_index value', months[last_index]);
                    //console.log('month_index value', months[5]);
                    $("#package-validity").html('<strong>The selected package will be applicable from ' +
                        months[month_index] + ' to next ' + months[last_index] +
                        ' from the selected financial year ' +
                        financial_year + '</strong>');

                }
                break;
            case 'year(s)':
                month_index = $.inArray(selected_month, months);
                //console.log('Found Index:', month_index);
                if (month_index != -1) {
                    last_index = (month_index + 12);
                }
                //console.log('new index', month_index, 12);
                if (last_index > 12) {
                    last_index = (last_index - 12);
                }
                last_index = (last_index - 1);
                //console.log('month_index value', months[last_index]);
                //console.log('month_index value', months[5]);
                $("#package-validity").html('<strong>The selected package will be applicable from ' +
                    months[month_index] + ' to ' + months[last_index] + ' of financial year ' +
                    financial_year + '</strong>');
                break;

            default:
                break;
        }
    }


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

    });

    /* function add_bank_block(elem) {
        let action = 'bank_block_box';
        let index = elem.attr('data-index');
        index = parseInt(index) + 1;
        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                index
            },
            success: function(response) {
                $(".bank-detail-box").append(response);
                elem.attr('data-index', index);
                // re-introduce the code to delete row
    $(".remove-bank-detail-box").on('click', function() {
        $(this).parent().parent().remove();
    });
}
});
}
$("#add-bank-info").on('click', function() {
    add_bank_block($(this));
});
$(".remove-sec80d-block").on('click', function() {
    $(this).parent().parent().remove();
});*/



})
</script>
@endsection