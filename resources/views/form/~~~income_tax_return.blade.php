<style>
    /*custom font*/
    @import url(https://fonts.googleapis.com/css?family=Montserrat);

    /*basic reset*/
    * {
        margin: 0;
        padding: 0;
    }

    html {
        height: 100%;
        background: #333982;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #333982; , #2a0845);
        /* Chrome 10-25, Safari 5.1-6 */
    }

    body {
        font-family: montserrat, arial, verdana;
        background: transparent;
        margin-bottom: 10%;
    }

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

</style>

<!--<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Taxring - Online e-file Tax Return, ITR Filing,TDS Refund,Income tax return,GST Registration,Company
        Registration,Accounting etc..</title>
</head>-->



<!-- MultiStep Form -->



<div class="row" style="margin-top: 4%;">
    <div class="header__logo" style="">
        <h2 style="margin-left: 35%; font-size: 1.5rem; color:#fff;">E-filling Income Tax Return</h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
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
            <fieldset>
                <h2 class="fs-title">Personal Information</h2>
                <h3 class="fs-subtitle">We are Taxring</h3>
                <input type="text" onchange="fillvaluepancard(this.value)" id="pancard" name="pancard"
                    placeholder="Pancard" required />
                <input id="name" type="text" name="name" placeholder="Full Name" required />
                <input id="dob" type="date" name="dob" placeholder="Date of Birth" required/>
                <input id="father_name" type="text" name="father_name" placeholder="Father Name" required/>

                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>

                </select>

                <input id="aadhar" class="mt-2" type="text" name="aadhar_number" placeholder="Aadhar Number" required/>
                <input type="button" name="next" class="next action-button" onclick="validatepart1()" value="Next" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Address Information</h2>
                <h3 class="fs-subtitle">We are Taxring</h3>
                <input type="text" name="flat_no" placeholder="Flat/Door/Block No*" />
                <input type="text" name="name_of_premises" placeholder="Name of Premises/Building/Village" />
                <input type="text" name="road" placeholder="Road/Street/Post Office" />
                <input type="text" name="area" placeholder="Area/Locality*" />
                <input type="text" name="town" placeholder="Town/City/District*" />
                <input type="text" name="state" placeholder="State*" />
                <input type="text" name="pincode" placeholder="Pin Code*" />
                <input type="text" name="mobile_no" placeholder="Mobile No*" />
                <input type="text" name="email_address" placeholder="Email address*" />
                <input type="text" name="residential_status" placeholder="Residential Status*" />


                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Bank Information</h2>
                <h3 class="fs-subtitle">We are Taxring</h3>

                {{-- <div id="add-bank-details">
                    <input type="text" name="ifsc_code[]" placeholder="IFSC Code"/>
                    <input type="password" name="bank_name[]" placeholder="Bank Name"/>
                    <input type="password" name="account_number[]" placeholder="Account Number"/>
    
                    Tick Account for refund<input type="checkbox" name="tick_account_for_refund" id=""><br>

                </div> --}}

                {{-- <button class="action-button" id="add_bank" >Add Bank info</button><br>

                <div id="paste-element-here">
                    
                </div> --}}

                <div class="field_wrapper">
                    <div>
                        <input type="text" name="ifsc_code[]" placeholder="IFSC Code" />
                        <input type="text" name="bank_name[]" placeholder="Bank Name" />
                        <input type="text" name="account_number[]" placeholder="Account Number" />

                        Tick Account for refund<input type="radio" name="tick_account_for_refund[]" value="1" id=""><br>

                        <a href="javascript:void(0);" class="add_button" title="Add field">Add more Bank</a>
                    </div>
                </div>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Employer & Tax filing Information</h2>
                <h3 class="fs-subtitle">We are Taxring</h3>
                <input type="text" name="employer_category" placeholder="Employer Category*" required />
                <input type="text" name="filing_status" placeholder="Filling Status*" required />
                <input type="text" name="original_acknowledgement_no" placeholder="Original Acknowledgement No*"
                    required />
                <input type="date" name="date_of_filling_of_original_return"
                    placeholder="Date of Filing of Original Return*" required />
                <input type="text" name="notice_no" placeholder="Notice No*" required />
                <textarea name="comment" id="" cols="15" rows="5" placeholder="Comment"></textarea>

                <div style="margin-bottom: 5%;">
                    <label for="other_document">Other Documents (if any)</label>
                    <input type="file" name="other_document" />

                </div>


                <div>
                    <label for="upload_form_1616a">Upload Form-1616A (if any)</label>
                
                    <img style="float: right;" src="{{ asset('korde/images/bg/efilling1.png') }}" alt="" width="55%"
                        height="20%">

                        <div style="width: 45%;float: left;">
                            <input id="fill_pancard" type="text" readonly><br>
                            <input type="text" name="efilling_password"
                                placeholder="Enter your login Credential Efilling">
                            <input type="file" name="upload_form_1616a" />

                        </div>

                </div>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                <input type="submit" class="submit action-button" value="Submit" />

                
            </fieldset>
        </form>

    </div>
</div>
<!-- /.MultiStep Form -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js">
</script>

<script type="text/javascript">
    function fillvaluepancard(xxx) {
        console.log(xxx);
        document.getElementById('fill_pancard').value = xxx;
    }

    function validatepart1() {
        var pancard = document.getElementById('pancard').value;
        var name = document.getElementById('name').value;
        var dob = document.getElementById('dob').value;
        var father_name = document.getElementById('father_name').value;
        var gender = document.getElementById('gender').value;
        var aadhar = document.getElementById('aadhar').value;

        if (pancard == "" || name == "" || dob == "" || father_name == "" || gender == "" || aadhar || "") {
            alert('Fill Form all Feilds');
            preventDefault();

        }

    }

    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
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
                    '<div><input type="text" name="ifsc_code[]" placeholder="IFSC Code"/><input type="text" name="bank_name[]" placeholder="Bank Name"/><input type="text" name="account_number[]" placeholder="Account Number"/>Tick Account for refund<input type="radio" name="tick_account_for_refund[]" value="' +
                    x +
                    '" id=""><br><a href="javascript:void(0);" class="remove_button">Remove Bank</a></div>'; //New input field html 
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
</script>
