@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix content-center">



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    GST Info
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif
                    <hr />
                    <table class="table table-bordered">
                        <tr>
                            <td>GST No.</td>
                            <td>{{ $gst_info->gst_no }}</td>
                        </tr>
                        <tr>
                            <td>Name of Firm</td>
                            <td>{{ $gst_info->firm_name }}</td>
                        </tr>
                        <tr>
                            <td>Name of Owner</td>
                            <td>{{ $gst_info->owner_name }}</td>
                        </tr>
                        <tr>
                            <td>GST Username</td>
                            <td>{{ $gst_info->gst_username }}</td>
                        </tr>
                        <tr>
                            <td>GST Password</td>
                            <td>{{ $gst_info->gst_passcode }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $gst_info->flat_no }}, {{ $gst_info->premises }},
                                {{ $gst_info->street }}, {{ $gst_info->locality }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $gst_info->city_name->name }}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{ $gst_info->state_name->name }}</td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>{{ $gst_info->zipcode }}</td>
                        </tr>
                        <tr>
                            <td>Email Id</td>
                            <td>{{ $gst_info->email_id }}</td>
                        </tr>
                        <tr>
                            <td>Phone No.</td>
                            <td>{{ $gst_info->phone_no }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Bank Details</strong></td>
                        </tr>
                        <tr>
                            <td>Bank A/c Number</td>
                            <td>{{ $gst_info->bank_ac_number }}</td>
                        </tr>
                        <tr>
                            <td>Bank IFSC</td>
                            <td>{{ $gst_info->bank_ifsc }}</td>
                        </tr>
                        <tr>
                            <td>Bank Name</td>
                            <td>{{ $gst_info->bank_name }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Plan Details</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td>#</td>
                                        <td>Plan</td>
                                        <td>Amount</td>
                                        <td>Duration</td>
                                        <td>Financial Year</td>
                                        <td>File From(Inc.)</td>
                                        <td>Payment Status</td>
                                        <td>Payment Date</td>
                                        <td>Action</td>
                                    </tr>
                                    @foreach($service_subscriptions as $service_subscription)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $service_subscription->service_plan->title }}</td>
                                        <td>Rs.{{ $service_subscription->amount }}</td>
                                        <td>{{ $service_subscription->plan_duration }}
                                            {{ $service_subscription->plan_duration_unit }}</td>
                                        <td>{{ $service_subscription->financial_year }} -
                                            {{ $service_subscription->financial_year_quarter }}</td>
                                        <td>{{ $service_subscription->retrun_to_be_file_from }}</td>
                                        <td>{{ $service_subscription->payment_status }}</td>
                                        <td>{{ $service_subscription->txn_date }}</td>
                                        <td>@if($service_subscription->payment_status!='Success')
                                            <a href="{{route('tr/user/gst-return-file/payment',['id'=>$service_subscription->id,'type'=>'gst-filing'])}}"
                                                class="btn btn-success btn-sm"> Pay</a>
                                            &nbsp;
                                            <a href="#" class="btn btn-success btn-sm">Edit</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </td>
                        </tr>


                    </table>
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>






                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>

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

    /*  $("#service_plan").on('change', function() {
         let data_plan = $(this).find(':selected').attr('data-plan');
         data_plan = JSON.parse(data_plan);
         $("#plan-info").html('<div class="alert alert-success">' + data_plan.description + '</div>');
         $("#payment_amount").html('<strong>₹' + data_plan.price + '</strong>');
     });

     $("#quarter").on('change', function() {
         let data_quarter = $(this).val();
         let data_months = $(this).find(':selected').attr('data-months');
         let return_to_be_file = document.getElementById("return_to_be_file");
         //remove existing options
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
         let data_plan = $("#service_plan").find(':selected').attr('data-plan');
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
         //remove existing options
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

     }); */





})
</script>
@endsection