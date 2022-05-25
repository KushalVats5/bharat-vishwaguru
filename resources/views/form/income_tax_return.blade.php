@extends('site-layout')
@section('content')
    <style>

    </style>

    <div class="insta-efiling" style="background-color: #333982">
        <div class="header__logo" style="padding-top: 40px; padding-left: 10%; color:white;">

            <h2 style="margin-left: 35%; font-size: 1.5rem;">E-filling Income Tax Return <br> <small>Please fill all
                    required * Fileds (pancard, name, mobile no etc) </small></h2>

        </div>

        <div class="row" style="margin-top: 4%;">
            <div class="col-md-12 col-md-offset-3">
                <form id="msform" method="POST" action="{{ route('income.tax.return.submit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Personal Details</li>
                        <li>Address Information</li>
                        <li>Bank Information</li>
                        <li>Employer & Tax filing Information</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset data-step="1">
                        <h2 class="fs-title">Personal Information</h2>
                        <h3 class="fs-subtitle">We are Taxring</h3>
                        <input type="text" id="pancard" name="pancard" placeholder="Pancard*" required />
                        <input type="text" name="name" id="fname" placeholder="Full Name*" required />
                        <input type="date" name="dob" id="dob" placeholder="Date of Birth*" required />
                        <input type="text" name="father_name" id="father_name" placeholder="Father Name*" required />

                        <select name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>

                        </select>

                        <input class="mt-2" type="text" name="aadhar_number" id="aadhar_number"
                            placeholder="Aadhar Number*" required />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset data-step="2">
                        <h2 class="fs-title">Address Information</h2>
                        <h3 class="fs-subtitle">We are Taxring</h3>
                        <input type="text" name="flat_no" id="flat_no" placeholder="Flat/Door/Block No*" />
                        <input type="text" name="name_of_premises" id="name_of_premises"
                            placeholder="Name of Premises/Building/Village" />
                        <input type="text" name="road" id="road" placeholder="Road/Street/Post Office" />
                        <input type="text" name="area" id="area" placeholder="Area/Locality*" />
                        <input type="text" name="town" id="town" placeholder="Town/City/District*" />
                        <input type="text" name="state" id="state" placeholder="State*" />
                        <input type="text" name="pincode" id="pincode" placeholder="Pin Code*" />
                        <input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile No*" />
                        <input type="text" name="email_address" id="email_address" placeholder="Email address*" />


                        <select name="residential_status" id="residential_status" required>

                            <option value=""></option>
                            <option value="resident_ordinarily_resident">Resident Ordinarily Resident</option>
                            <option value="resident_and_non_ordinarily_resident">Resident and Non Ordinarily Resident
                            </option>
                            <option value="non_resident">Non Resident</option>
                        </select>


                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset data-step="3">
                        <h2 class="fs-title">Bank Information</h2>
                        <h3 class="fs-subtitle">We are Taxring</h3>


                        <div class="field_wrapper">
                            <div>
                                <input type="text" name="bank_name[]" id="bank_name" placeholder="Bank Name*" />
                                <input type="text" name="account_number[]" id="account_number"
                                    placeholder="Account Number*" />
                                <input type="text" name="ifsc_code[]" id="ifsc_code" placeholder="IFSC Code*" />

                                <!-- Select Box Account for refund<input type="radio" name="tick_account_for_refund[]" value="1" id=""> -->
                                <br>
                                <label class="radio-button">
                                    <input type="radio" name="tick_account_for_refund[]" id="tick_account_for_refund"
                                        checked="checked" value="1">
                                    <span class="label-visible">
                                        <span class="fake-radiobutton"></span>
                                        Tick account for refund
                                    </span>
                                </label>
                                <br>

                                <a href="javascript:void(0);" class="add_button" title="Add field">Add more Bank</a>
                            </div>
                        </div>

                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>

                    <fieldset data-step="4">
                        <h2 class="fs-title">Employer & Tax filing Information</h2>
                        <h3 class="fs-subtitle">We are Taxring</h3>


                        <select name="employer_category" id="employer_category">
                            <option value="">Employer Category</option>
                            <option value="central_goverment">Central Goverment</option>
                            <option value="state_goverment">State Goverment</option>
                            <option value="public_sector_unit">Public Sector Unit</option>
                            <option value="others">Others</option>
                            <option value="not_applicable">Not Applicable</option>
                        </select>

                        <select name="filing_status" id="filing_status" onchange="checkfillingstatus(this.value)">
                            <option value="">Select Filling Status</option>
                            <option value="original">Original</option>
                            <option value="revised">Revised</option>
                            <option value="defective_u/s_139(9)">Defective u/s 139(9)</option>
                        </select>

                        <input class="mt-2" type="text" id="hide_original_acknowledgement_no"
                            name="original_acknowledgement_no" placeholder="Original Acknowledgement No*" />

                        <input type="date" id="hide_date_of_filling_of_original_return"
                            name="date_of_filling_of_original_return" placeholder="Date of Filing of Original Return*" />

                        <input class="mt-2" type="text" id="hide_notice_no" name="notice_no"
                            placeholder="Notice No*" />

                        <textarea name="comment" id="comment" cols="15" rows="5" placeholder="Comment"></textarea>


                        <div class="upload-wrapper mt-5">
                            <label for=""> Login Credential at Income Tax Portal</label>
                            <div class="upload-wrapper-inner">
                                <div class="uploaded-img">
                                    <img src="{{ asset('korde/images/bg/efilling1.png') }}" alt="">
                                </div>

                                <div class="uploaded-img-form">
                                    <input id="fill_pancard" name="fill_pancard" type="text" value="" style="pointer-events: none;"><br>
                                    <input type="text" name="efilling_password" id="efilling_password"
                                        placeholder="Enter your login Credential Efilling">
                                </div>
                            </div>

                        </div>

                        <div class="row  mt-4">
                            <label class="col-md-6" for="upload_form_1616a">Upload Form-16/16A (if any)</label>
                            <input class="col-md-6" type="file" name="upload_form_1616a" />
                        </div>

                        <div class="row">
                            <label class="col-md-6" for="other_document">Other Documents (if any)</label>
                            <input class="col-md-6" type="file" name="other_document" />

                        </div>



                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="submit" class="submit action-button" value="Submit" />


                    </fieldset>
                </form>

            </div>
        </div>
        <!-- /.MultiStep Form -->
    </div>
@endsection
@section('script')
    <style>
        /*custom font*/



        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input,
        #msform textarea,
        #msform select {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #ee0979;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #ee0979;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
        }

        #msform .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }

        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 25%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1;
            /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #ee0979;
            color: white;
        }


        /* Not relevant to this form */
        .dme_link {
            margin-top: 30px;
            text-align: center;
        }

        .dme_link a {
            background: #FFF;
            font-weight: bold;
            color: #ee0979;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 5px 25px;
            font-size: 12px;
        }

        .dme_link a:hover,
        .dme_link a:focus {
            background: #C5C5F1;
            text-decoration: none;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgb(0 0 0 / 40%);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 5% 10%;
            position: relative !important;
        }

        label.error {
            color: red;
            float: left;
        }

    </style>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js">
    </script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha512-0QDLUJ0ILnknsQdYYjG7v2j8wERkKufvjBNmng/EdR/s/SE7X8cQ9y0+wMzuQT0lfXQ/NhG+zhmHNOWTUS3kMA=="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        var msformValidation;

        $(document).ready(function() {

            // instantiate the jquery validation plugin on the 'msform' 
            // and define the validation rules.
            msformValidation = $('#msform').validate({
                // submitHandler: function() {}, // prevent traditional form submission
                rules: {
                    'pancard': {
                        required: true
                    },
                    'fname': {
                        required: true
                    },
                    'dob': {
                        required: true
                    },
                    'father_name': {
                        required: true
                    },
                    'gender': {
                        required: true
                    },
                    'aadhar_number': {
                        required: true
                    },
                    // Step 2 validation
                    'flat_no': {
                        required: true
                    },
                    'name_of_premises': {
                        required: true
                    },
                    'road': {
                        required: true
                    },
                    'area': {
                        required: true
                    },
                    'town': {
                        required: true
                    },
                    'state': {
                        required: true
                    },
                    'pincode': {
                        required: true
                    },
                    'mobile_no': {
                        required: true
                    },
                    'email_address': {
                        required: true
                    },
                    'residential_status': {
                        required: true
                    },
                    // Step 3 validation
                    'bank_name[]': {
                        required: true,
                        minlength: 1,
                    },

                    'account_number[]': {
                        required: true,
                        minlength: 1,
                    },

                    'ifsc_code[]': {
                        required: true,
                        minlength: 1,
                    },


                    'employer_category': {
                        required: true
                    },

                    'filing_status': {
                        required: true
                    }

                }
            });

            $(".next").click(function() {

                if (animating) return false;
                animating = false;

                current_fs = $(this).parent();
                var validationPassed = false;
                if (current_fs.data('step') == 1) {                   
                    validationPassed = $('#pancard').valid();
                    validationPassed = $('#fname').valid();
                    validationPassed = $('#dob').valid();
                    validationPassed = $('#father_name').valid();
                    validationPassed = $('#gender').valid();
                    validationPassed = $('#aadhar_number').valid();
                } else if (current_fs.data('step') == 2) {
                    validationPassed = $('#flat_no').valid();
                    validationPassed = $('#name_of_premises').valid();
                    validationPassed = $('#road').valid();
                    validationPassed = $('#area').valid();
                    validationPassed = $('#town').valid();
                    validationPassed = $('#state').valid();
                    validationPassed = $('#pincode').valid();
                    validationPassed = $('#mobile_no').valid();
                    validationPassed = $('#email_address').valid();
                    validationPassed = $('#residential_status').valid();
                } else if (current_fs.data('step') == 3) {
                    validationPassed = $('#bank_name').valid();
                    validationPassed = $('#account_number').valid();
                    validationPassed = $('#ifsc_code').valid();

                } else if (current_fs.data('step') == 4) {
                    validationPassed = $('#employer_category').valid();
                    validationPassed = $('#filing_status').valid();
                }

                
                if (validationPassed == false) {
                    // do not proceed!                   
                    animating = false;
                    return;
                }
                $('#fill_pancard').val($('.pancard').val());
                $.ajax({
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        // "formData" :  $('#msform').serializeArray(),
                        "formData" : $('#msform').serialize()
                        },
                    url: "{{ route('serviceFormQuery') }}",
                    success: function(msg){
                        // do whatever you want with the response 
                    }
                });
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'position': 'absolute'
                        });
                        next_fs.css({
                            'left': left,
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            $(".previous").click(function() {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1 - now) * 50) + "%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'left': left
                        });
                        previous_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            // $(".submit").click(function(){
            // 	return false;
            // })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var x = 1; //Initial field counter is 1


            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    var fieldHTML =
                        '<div><input type="text" name="ifsc_code[]" placeholder="IFSC Code"/><input type="text" name="bank_name[]" placeholder="Bank Name"/><input type="text" name="account_number[]" placeholder="Account Number"/><label class="radio-button"><input type="radio" name="tick_account_for_refund[]" value="' +
                        x +
                        '"><span class="label-visible"><span class="fake-radiobutton"></span>Tick account for refund</span></label><br><a href="javascript:void(0);" class="remove_button">Remove Bank</a></div>'; //New input field html 
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        function checkfillingstatus(val) {
            console.log(val);
            if (val == 'original') {
                document.getElementById('hide_original_acknowledgement_no').style.display = "none";
                document.getElementById('hide_date_of_filling_of_original_return').style.display = "none";
                document.getElementById('hide_notice_no').style.display = "none";

            }

            if (val == 'revised' || val == 'defective_u/s_139(9)') {
                document.getElementById('hide_original_acknowledgement_no').style.display = "block";
                document.getElementById('hide_date_of_filling_of_original_return').style.display = "block";
                document.getElementById('hide_notice_no').style.display = "block";

            }


        }
    </script>
    <style>
        .radio-button,
        .checkbox {
            position: relative;
            margin: 20px 0;
        }

        .checkbox {
            display: block;
        }

        .radio-button input,
        .checkbox input {
            position: absolute;
            margin: 5px;
            padding: 0;
            /* for mobile accessibility (iOS Label Bug) */
            visibility: hidden;
        }

        .radio-button .label-visible,
        .checkbox .label-visible {
            margin-left: 2em;
            margin-bottom: 0;
        }

        .fake-radiobutton,
        .fake-checkbox {
            position: absolute;
            display: block;
            top: 0;
            left: 3px;
            width: 20px;
            height: 20px;
            border: 1px solid slategray;
            background-color: white;
        }

        .fake-radiobutton:after,
        .fake-checkbox:after {
            content: "";
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 16px;
            height: 16px;
            background: navy;
            transform: translateX(-50%) translateY(-50%);
        }

        .fake-radiobutton {
            border-radius: 50%;
        }

        .fake-radiobutton:after {
            border-radius: 50%;
        }

        input[type="radio"]:checked+span .fake-radiobutton:after,
        input[type="checkbox"]:checked+span .fake-checkbox:after {
            display: block;
        }

    </style>
@endsection
