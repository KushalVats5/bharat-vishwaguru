
@php
$bank_name = !empty($formfilled->bank_name) ? json_decode($formfilled->bank_name, true) : null;
$bank_ifsc = !empty($formfilled->bank_ifsc) ? json_decode($formfilled->bank_ifsc, true) : null;
$bank_account_number = !empty($formfilled->bank_account_number) ? json_decode($formfilled->bank_account_number, true) : null;
$tick_account_for_refund = !empty($formfilled->tick_account_for_refund) ? json_decode($formfilled->tick_account_for_refund, true) : null;
@endphp
{{-- {{dd($formfilled->bank_name, $formfilled->bank_ifsc, $formfilled->bank_account_number, $formfilled->tick_account_for_refund)}} --}}


@php $subject  = 'Income Tax Return' @endphp
{{-- @php $formName = $form['name']. ' Form Filled'}} @endphp --}}



{{-- @if($form['name'] == 'Contact Us')
@php $name  = '<strong>Name: </strong>'.(isset($messages->name)) ? $messages->name : null @endphp
@php $email  = '<strong>Email: </strong>'.(isset($messages->email)) ? $messages->email : null @endphp
@php $subject  = '<strong>Subject: </strong>'.(isset($messages->subject)) ? $messages->subject : null @endphp
@php $phone  = '<strong>Phone: </strong>'.(isset($messages->phone)) ? $messages->phone : null @endphp
@php $message  = '<strong>Message: </strong>'.(isset($messages->message)) ? $messages->message : null @endphp
@endif


@if($form['name'] == 'Registration Form')
@php $subject  = 'Registration Form' @endphp
@php $name  = '<strong>Name: </strong>'.(isset($messages->name)) ? $messages->name : null @endphp
@php $email  = '<strong>Email: </strong>'.(isset($messages->email)) ? $messages->email : null @endphp
@php $mobile  = '<strong>Mobile: </strong>'.(isset($messages->mobile)) ? $messages->mobile : null @endphp
@endif


@if($form['name'] == 'instaEfilling')
@php $subject  = 'Insta-E-Filling' @endphp
@php $are_you = (isset($formfilled->are_you)) ? '<strong>Are You: </strong>'.$formfilled->are_you : null @endphp
@php $pancard = (isset($formfilled->pancard)) ? '<strong>Pancard: </strong>'.$formfilled->pancard : null @endphp
@php $name = (isset($formfilled->name)) ? '<strong>Name: </strong>'.$formfilled->name : null @endphp
@php $dob  = '<strong>DOB: </strong>'.(isset($formfilled->dob)) ? $formfilled->dob : null @endphp
@php $father_name  = '<strong>Father Name: </strong>'.(isset($formfilled->father_name)) ? $formfilled->father_name : null @endphp
@php $addhar_number  = '<strong>Mobile No: </strong>'.(isset($formfilled->addhar_number)) ? $formfilled->addhar_number : null @endphp
@php $email  = '<strong>Email: </strong>'.(isset($formfilled->email)) ? $formfilled->email : null @endphp
@php $mobile_no  = '<strong>Mobile No: </strong>'.(isset($formfilled->mobile_no)) ? $formfilled->mobile_no : null @endphp
@php $bank_information  = '<strong>Mobile No: </strong>'.(isset($formfilled->bank_information)) ? $formfilled->bank_information : null @endphp
@php $ifsc_code  = '<strong>Mobile No: </strong>'.(isset($formfilled->ifsc_code)) ? $formfilled->ifsc_code : null @endphp
@php $comment  = '<strong>Mobile No: </strong>'.(isset($formfilled->comment)) ? $formfilled->comment : null @endphp

@endif


@if($form['name'] == 'Income Tax Return')
@php $subject  = 'Income Tax Return' @endphp
@php $pancard = (isset($formfilled->pancard)) ? '<strong>Are You: </strong>'.$formfilled->pancard : null @endphp
@php $name = (isset($formfilled->name)) ? '<strong>Name: </strong>'.$formfilled->name : null @endphp
@php $dob  = '<strong>DOB: </strong>'.(isset($formfilled->dob)) ? $formfilled->dob : null @endphp
@php $father_name  = '<strong>Father Name: </strong>'.(isset($formfilled->father_name)) ? $formfilled->father_name : null @endphp
@php $addhar_number  = '<strong>Mobile No: </strong>'.(isset($formfilled->addhar_number)) ? $formfilled->addhar_number : null @endphp

@php $gender  = '<strong>Gender: </strong>'.(isset($formfilled->gender)) ? $formfilled->gender : null @endphp
@php $name_of_premises  = '<strong>Name Of Premises: </strong>'.(isset($formfilled->name_of_premises)) ? $formfilled->name_of_premises : null @endphp

@php $residential_status  = '<strong>Residential Status: </strong>'.(isset($formfilled->residential_status)) ? $formfilled->residential_status : null @endphp
@php $flat_no  = '<strong>Flat No: </strong>'.(isset($formfilled->flat_no)) ? $formfilled->flat_no : null @endphp
@php $road  = '<strong>Road: </strong>'.(isset($formfilled->road)) ? $formfilled->road : null @endphp
@php $area  = '<strong>Area: </strong>'.(isset($formfilled->area)) ? $formfilled->area : null @endphp
@php $town  = '<strong>Town: </strong>'.(isset($formfilled->town)) ? $formfilled->town : null @endphp
@php $state  = '<strong>State: </strong>'.(isset($formfilled->state)) ? $formfilled->state : null @endphp
@php $pincode  = '<strong>Pincode: </strong>'.(isset($formfilled->pincode)) ? $formfilled->pincode : null @endphp

@php $mobile_no  = '<strong>Mobile No: </strong>'.(isset($formfilled->mobile_no)) ? $formfilled->mobile_no : null @endphp
@php $email_address  = '<strong>Email Address: </strong>'.(isset($formfilled->email_address)) ? $formfilled->email_address : null @endphp

@php $employer_category  = '<strong>Employer Category: </strong>'.(isset($formfilled->employer_category)) ? $formfilled->employer_category : null @endphp
@php $filing_status  = '<strong>Filing Status: </strong>'.(isset($formfilled->filing_status)) ? $formfilled->filing_status : null @endphp
@php $original_acknowledgement_no  = '<strong>Original Acknowledgement No: </strong>'.(isset($formfilled->original_acknowledgement_no)) ? $formfilled->original_acknowledgement_no : null @endphp
@php $date_of_filling_of_original_return  = '<strong>Date Of Filling Of Original Return: </strong>'.(isset($formfilled->date_of_filling_of_original_return)) ? $formfilled->date_of_filling_of_original_return : null @endphp
@php $notice_no  = '<strong>Notice No: </strong>'.(isset($formfilled->notice_no)) ? $formfilled->notice_no : null @endphp

@endif --}}

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<?php
$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
    /* Type ------------------------------ */
    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',
    /* Buttons ------------------------------ */
    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>
<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>
<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    
                    <tr>
                        <td style="{{ $style['email-masthead'] }}"><a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank"> <img src="https://taxring.com/storage/default/taxring.jpg" alt="Taxring IT Solutions Pvt Ltd" title="Taxring IT Solutions Pvt Ltd" height="150px" />
                            <!--{{ config('app.name') }}-->
                        </a><br /><br />
                                <!--{{ config('app.name') }}-->
                            </a><br /><br />
                            <div align="center"><h3><strong>Welcome:</strong> {{$formfilled->name}}</h3></div>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <h1>{{ 'Income Tax Return'}}</h1>
                                <tr>
                                    <th colspan="2" class="border-0">form Detail </th>
                                </tr>
                                
                                @if (!empty($bank_name))
                                    @for ($i = 0; $i < count($bank_name); $i++)
                                    @php $j = 1; @endphp
                                    <tr>                                        
                                         <td align="center"><strong width="" style="float: left; width: 20%; text-align: left;">Bank Name {{$j}} :</strong> <span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $bank_name[$i] }}</span></td>
                                    </tr>
                                    @php $j++; @endphp
                                    @endfor
                                @endif
                                @if (!empty($bank_ifsc))
                                    @for ($i = 0; $i < count($bank_ifsc); $i++)
                                    @php $j = 1; @endphp
                                    <tr>                                        
                                         <td align="center"><strong width="" style="float: left; width: 20%; text-align: left;">Bank Name {{$j}} :</strong> <span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $bank_ifsc[$i] }}</span></td>
                                    </tr>
                                    @php $j++; @endphp
                                    @endfor
                                @endif
                                @if (!empty($bank_account_number))
                                    @for ($i = 0; $i < count($bank_account_number); $i++)
                                    @php $j = 1; @endphp
                                    <tr>                                        
                                         <td align="center"><strong width="" style="float: left; width: 20%; text-align: left;">Bank Name {{$j}} :</strong> <span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $bank_account_number[$i] }}</span></td>
                                    </tr>
                                    @php $j++; @endphp
                                    @endfor
                                @endif
                                @if (!empty($tick_account_for_refund))
                                    @for ($i = 0; $i < count($tick_account_for_refund); $i++)
                                    @php $j = 1; @endphp
                                    <tr>                                        
                                         <td align="center"><strong width="" style="float: left; width: 20%; text-align: left;">Bank Name {{$j}} :</strong> <span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $tick_account_for_refund[$i] }}</span></td>
                                    </tr>
                                    @php $j++; @endphp
                                    @endfor
                                @endif
                                
                                
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Pancard: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->pancard }}</span></td>
                                </tr>
                                
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Created: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ date_format($formfilled->created_at, 'jS M Y') }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Name: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->name }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Date of Birth: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->dob }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Father Name: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->father_name }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Gender: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->gender }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Aadhar Number: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->aadhar_number }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Flat No.: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->flat_no }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Name of Premises: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->name_of_premises }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Road: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->road }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Area: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->area }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Town: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->town }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Pancard: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->pancard }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">State: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->state }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Pincode: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->pincode }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Mobile Number: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->mobile_no }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Email: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->email_address }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Residential Address: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->residential_status }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Employee Category: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->employer_category }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Filling Status: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->filing_status }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Original Acknowledgement no.: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->original_acknowledgement_no }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Date of filling Original Return: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->date_of_filling_of_original_return }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Notice no.: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->notice_no }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">comment: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->comment }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Pancard: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->pancard }}</span></td>
                                </tr>
                                
                                <tr>                                    
                                     <td align="center"><strong style="float: left; width: 20%; text-align: left;">Efilling Password: </strong><span style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $formfilled->efilling_password }}</span></td>
                                </tr>                        
                            	<tr></tr>
                            </table>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center"><strong>Reference No: </strong>{{$data['reference']}} </td>
                                </tr>
                                <tr>
                                    <td align="center"><strong>Title: </strong>{{$data['title']}} </td>
                                </tr>
                                <tr>
                                    <td align="center"><strong>Price: </strong>{{$data['currency']}} {{$data['price']}} </td>
                            	</tr>
                                <tr>
                                    <td align="center"><strong>Request Type: </strong>{{$data['RequestType']}} </td>
                            	</tr>
                                <tr>
                                    <td align="center"><strong>Remarks: </strong>{{$data['Remarks']}} </td>
                            	</tr>
                                <tr></tr>
                            	<br>
                            	<tr>
                                    {{-- <td align="center">You can see your booking <a href="{{route('hotels.HotelBookingDetail', $data['reference'])}}" target="_blank"> Click Here</a></td> 
                                    <td align="center">You can see your booking <a href="{{route('user.hotel.bookings')}}" target="_blank"> Click Here</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr> --}}
                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}"> &copy; {{ date('Y') }} <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ __('https://taxring.com/') }}</a>.
                                            All rights reserved. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>



