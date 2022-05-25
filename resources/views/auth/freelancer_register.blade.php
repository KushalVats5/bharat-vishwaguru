@extends('site-layout')
@section('content')
<div class="login-page">
    <div class="site-login-signup site-signup">
        <div class="banner-login">
            <div class="top-relement"></div>
        </div>
        <div class="container clearfix">
            <div class="row custom-row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1 clearfix">
                    <div class="row calculator-wrapper">
                        <div class="col-md-4 col-sm-5 col-xs-12 left">
                            <h2>Register</h2>
                            <p></p>
                            <p>
                                Looking for Online Tax filing, GST & Accounting Help?? <br class="hidde-sm hidden-xs" />
                                Register Now to file your tax return. It's Easiest, Fastest, Convenient & Secure.
                            </p>
                            <div class="contact-detail clearfix" id="contact-detail">
                                <ul>
                                    <li>
                                        <figure>
                                            <img src="{{ asset('korde/images/bg/contact.jpeg') }}" alt="" />
                                        </figure>
                                        <small>&nbsp;get in touch:</small>
                                        <span><strong> +91 9990-07-08-84</strong></span>
                                    </li>
                                    <li>
                                        <figure><img src="{{ asset('korde/images/bg/mail.jpeg') }}" alt="" /></figure>
                                        <small>e-Mail:</small>
                                        <span><a href="mailto:support@taxring.com"> support@taxring.com</a></span>
                                    </li>
                                </ul>
                            </div>
                            <br class="hidden-xs" /><br class="hidden-xs" />
                        </div>
                        <div class="col-md-8 col-sm-7 col-xs-12 right">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif


                                    <form class="card mt-0" id="regForm"
                                        action="{{ route('freelancer.register.save') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="role" value="freelancer">
                                        <!-- One "tab" for each step in the form: -->
                                        <div class="tab form-group col-md-12">
                                            <h6 style="text-align: center" class="mt-4 mb-3">
                                                Personal Information
                                            </h6>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="Full name"
                                                        oninput="this.className = ''" name="name" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="Father name"
                                                        oninput="this.className = ''" name="father_name" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="email" class="form-control"
                                                        placeholder="E-Mail Address" oninput="this.className = ''"
                                                        name="email" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" type="password"
                                                        placeholder="Enter Password" oninput="this.className = ''"
                                                        name="password" id="user_password" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="date" class="form-control" placeholder="Date of birth"
                                                        oninput="this.className = ''" name="dob" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="Mobile"
                                                        oninput="this.className = ''" name="mobile" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="Pancard"
                                                        oninput="this.className = ''" name="pan" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="Aadhar"
                                                        oninput="this.className = ''" name="aadharno" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <select name="qualification" id="qualification" class="form-control"
                                                        required>
                                                        <option value="ca">--Select Qualification--</option>
                                                        <option value="ca">CA</option>
                                                        <option value="cma">CMA</option>
                                                        <option value="advocate">Advocate</option>
                                                        <option value="mba">MBA</option>
                                                        <option value="graduation">Graduation</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab form-group col-md-12">
                                            <h6 style="text-align: center" class="mt-4 mb-3">
                                                Communication Information
                                            </h6>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Flatno./FLoor"
                                                        oninput="this.className = ''" name="flat" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Premises name/Village name"
                                                        oninput="this.className = ''" name="premises" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Road /Streed no"
                                                        oninput="this.className = ''" name="road_no" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Area/Locality"
                                                        oninput="this.className = ''" name="area" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Distic"
                                                        oninput="this.className = ''" name="distic" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <select name="state" id="state" class="form-control" required>
                                                        <option value="">- Select State -</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar
                                                            Islands</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli
                                                        </option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Pincode"
                                                        oninput="this.className = ''" name="pincode" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab form-group col-md-12">
                                            <h6 style="text-align: center" class="mt-4 mb-3">
                                                Bank Information
                                            </h6>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Enter Account Number"
                                                        oninput="this.className = ''" name="bank[account_no]"
                                                        id="bank_account_no" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <input class="form-control" placeholder="Enter IFSC Code"
                                                        oninput="this.className = ''" name="bank[ifsc]" id="bank_ifsc"
                                                        required />
                                                </div>
                                                <a href="javascript:;" class="checkIfsc">Check Ifsc</a>
                                            </div>
                                            <div class="float-left bank_ifsc_details">
                                            </div>

                                        </div>

                                        <div class="tab form-group col-md-12">
                                            <h6 style="text-align: center" class="mt-4 mb-3">
                                                Education Certificate
                                            </h6>

                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <span class="" role=""><small>Upload Education
                                                            Certificate</small></span>
                                                    <input type="file" class="form-control" placeholder=""
                                                        oninput="this.className = ''" name="education_certificate"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <span class="" role=""><small>Upload Pancard</small></span>
                                                    <input type="file" class="form-control" placeholder=""
                                                        oninput="this.className = ''" name="pancard" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <span class="" role=""><small>Upload Aadhar Card</small></span>
                                                    <input type="file" class="form-control" placeholder=""
                                                        oninput="this.className = ''" name="aadhar" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <span class="" role=""><small>Upload Resume</small></span>
                                                    <input type="file" class="form-control" placeholder=""
                                                        oninput="this.className = ''" name="resume" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 float-left">

                                                <div class="">
                                                    <span class="" role=""><small>Upload Cancel Cheque</small></span>
                                                    <input type="file" class="form-control" placeholder=""
                                                        oninput="this.className = ''" name="cancel_cheque" required />
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group col-md-12">
                                            <div style="overflow:auto;">
                                                <div style="float:right; margin-top: 5px;">
                                                    <button type="button" class="previous">Previous</button>
                                                    <button type="button" class="next">Next</button>
                                                    <button type="button" class="submit">Submit</button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#bank_ifsc').keyup(function() {
            $('.bank_ifsc_details').html('');
            $('.next').css('pointer-events', 'none');
        });
        $('.checkIfsc').click(function() {
            $('.bank_ifsc_details').html('');
            $.ajax({
                type: "post",
                url: "{{ route('check_ifsc') }}",
                data: {
                    _token: '<?php echo csrf_token(); ?>',
                    ifsc: $('#bank_ifsc').val(),
                },
                success: function(data) {
                    if (data != 'Invalid IFSC Code') {
                        console.log(data);
                        $('.bank_ifsc_details').html(data);
                        $('.next').css('pointer-events', 'inherit');
                    } else {
                        alert(data);
                        $('.bank_ifsc_details').html('');
                        $('.next').css('pointer-events', 'none')
                    }
                }
            });
        });
        /*   $.validator.addMethod('date', function(value, element, param) {
              return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
          }, 'Please enter a valid date!');
          $.validator.addMethod('month', function(value, element, param) {
              return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
          }, 'Please enter a valid month!');
          $.validator.addMethod('year', function(value, element, param) {
              return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
          }, 'Please enter a valid year not less than 1900!');
          $.validator.addMethod('username', function(value, element, param) {
              var nameRegex = /^[a-zA-Z0-9]+$/;
              return value.match(nameRegex);
          }, 'Only a-z, A-Z, 0-9 characters are allowed'); */

        var val = {
            // Specify validation rules
            rules: {
                'name': {
                    required: true,
                },
                'father_name': {
                    required: true,
                },
                'dob': {
                    required: true,
                },
                'mobile': {
                    required: true,
                },
                'pan': {
                    required: true,
                },
                'aadhar': {
                    required: true,
                },

                'qualification': {
                    required: true,
                },
                // Step 2 validation
                'flat': {
                    required: true,
                },
                'premises': {
                    required: true,
                },
                'road_no': {
                    required: true,
                },
                'area': {
                    required: true,
                },
                'distic': {
                    required: true,
                },
                'state': {
                    required: true,
                },
                'pincode': {
                    required: true,
                },
                'ifsc': {
                    required: true,
                },
                //
                /*  'education_certificate': {
                     required: true,
                 },
                 'pancard': {
                     required: true,
                 },
                 'aadharno': {
                     required: true,
                 },
                 'resume': {
                     required: true,
                 },
                 'cancel_cheque': {
                     required: true,
                 }, */
            },
            // Specify validation error messages
            /* messages: {
                fname: "First name is required",
                email: {
                    required: "Email is required",
                    email: "Please enter a valid e-mail",
                },
                phone: {
                    required: "Phone number is requied",
                    minlength: "Please enter 10 digit mobile number",
                    maxlength: "Please enter 10 digit mobile number",
                    digits: "Only numbers are allowed in this field"
                },
                date: {
                    required: "Date is required",
                    minlength: "Date should be a 2 digit number, e.i., 01 or 20",
                    maxlength: "Date should be a 2 digit number, e.i., 01 or 20",
                    digits: "Date should be a number"
                },
                month: {
                    required: "Month is required",
                    minlength: "Month should be a 2 digit number, e.i., 01 or 12",
                    maxlength: "Month should be a 2 digit number, e.i., 01 or 12",
                    digits: "Only numbers are allowed in this field"
                },
                year: {
                    required: "Year is required",
                    minlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                    maxlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                    digits: "Only numbers are allowed in this field"
                },
                username: {
                    required: "Username is required",
                    minlength: "Username should be minimum 4 characters",
                    maxlength: "Username should be maximum 16 characters",
                },
                password: {
                    required: "Password is required",
                    minlength: "Password should be minimum 8 characters",
                    maxlength: "Password should be maximum 16 characters",
                }
            } */
        }
        $("#regForm").multiStepForm({
            // defaultStep:0,
            beforeSubmit: function(form, submit) {
                console.log("called before submiting the form");
                console.log(form);
                console.log(submit);
            },
            validations: val,
        }).navigateTo(0);
    });
    </script>

    <style>
    * {
        box-sizing: border-box;
    }

    .tab {
        display: none;
        width: 100%;
        height: 50%;
        margin: 0px auto;
    }

    .current {
        display: block;
    }






    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    .previous {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 30px;
        width: 30px;
        cursor: pointer;
        margin: 0 2px;
        color: #fff;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.8;
        padding: 5px
    }

    .step.active {
        opacity: 1;
        background-color: #69c769;
    }

    .step.finish {
        background-color: #4CAF50;
    }

    .error {
        color: #f00;
    }
    </style>
    <script>
    (function($) {
        $.fn.multiStepForm = function(args) {
            if (args === null || typeof args !== 'object' || $.isArray(args))
                throw " : Called with Invalid argument";
            var form = this;
            var tabs = form.find('.tab');
            var steps = form.find('.step');
            steps.each(function(i, e) {
                $(e).on('click', function(ev) {});
            });
            form.navigateTo = function(i) {
                /*index*/
                /*Mark the current section with the class 'current'*/
                tabs.removeClass('current').eq(i).addClass('current');
                // Show only the navigation buttons that make sense for the current section:
                form.find('.previous').toggle(i > 0);
                atTheEnd = i >= tabs.length - 1;
                form.find('.next').toggle(!atTheEnd);
                // console.log('atTheEnd='+atTheEnd);
                form.find('.submit').toggle(atTheEnd);
                fixStepIndicator(curIndex());
                return form;
            }

            function curIndex() {
                /*Return the current index by looking at which section has the class 'current'*/
                return tabs.index(tabs.filter('.current'));
            }

            function fixStepIndicator(n) {
                steps.each(function(i, e) {
                    i == n ? $(e).addClass('active') : $(e).removeClass('active');
                });
            }
            /* Previous button is easy, just go back */
            form.find('.previous').click(function() {
                form.navigateTo(curIndex() - 1);
            });

            /* Next button goes forward iff current block validates */
            form.find('.next').click(function() {
                if ('validations' in args && typeof args.validations === 'object' && !$.isArray(args
                        .validations)) {
                    if (!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args
                            .noValidate)) {
                        form.validate(args.validations);
                        if (form.valid() == true) {
                            form.navigateTo(curIndex() + 1);
                            return true;
                        }
                        return false;
                    }
                }
                form.navigateTo(curIndex() + 1);
            });
            form.find('.submit').on('click', function(e) {
                if (typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
                    args.beforeSubmit(form, this);
                /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/
                if (typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args
                        .submit)) {
                    form.submit();
                }
                return form;
            });
            /*By default navigate to the tab 0, if it is being set using defaultStep property*/
            typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;
            form.noValidate = function() {

            }
            return form;
        };
    }(jQuery));
    </script>
    @endsection