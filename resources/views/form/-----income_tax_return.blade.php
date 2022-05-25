@extends('site-layout')

@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #ccdbd3;
        }

        #regForm {
            background-color: #ffffff;
            margin: 10% auto;
            font-family: Raleway;
            padding: 6%;
            width: 70%;
            min-width: 300px;

        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
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

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

    </style>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('korde/images/bg/efilling1.png') }}" alt="" style="padding:  6%; margin: 4.3% auto;">

        </div>

        <div class="col-md-6">
            <form id="regForm" action="/action_page.php">

                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <h3 class="fs-title">Personal Information<small class="text-success">(We are Taxring)</small></h3>
                    {{-- <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
                    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p> --}}

                    <p><input type="text" onchange="fillvaluepancard(this.value)" id="pancard" name="pancard"
                            oninput="this.className = ''" placeholder="Pancard" required /></p>
                    <p><input id="aadhar" class="mt-2" type="text" name="aadhar_number"
                            oninput="this.className = ''" placeholder="Aadhar Number" required /></p>
                    <p><input id="name" type="text" name="name" oninput="this.className = ''" placeholder="Full Name"
                            required /></p>
                    <p><input id="dob" type="date" name="dob" oninput="this.className = ''" placeholder="Date of Birth"
                            required /></p>
                    <p><input id="father_name" type="text" name="father_name" oninput="this.className = ''"
                            placeholder="Father Name" required /></p>

                    <p><select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>

                        </select></p>

                </div>
                <div class="tab">
                    <h3 class="fs-title">Address Information<small class="text-success">(We are Taxring)</small></h3>

                    <p> <input type="text" name="flat_no" placeholder="Flat/Door/Block No*" /></p>
                    <p> <input type="text" name="name_of_premises" placeholder="Name of Premises/Building/Village" /></p>
                    <p> <input type="text" name="road" placeholder="Road/Street/Post Office" /></p>
                    <p> <input type="text" name="area" placeholder="Area/Locality*" /></p>
                    <p> <input type="text" name="town" placeholder="Town/City/District*" /></p>
                    <p> <input type="text" name="state" placeholder="State*" /></p>
                    <p> <input type="text" name="pincode" placeholder="Pin Code*" /></p>
                    <p> <input type="text" name="mobile_no" placeholder="Mobile No*" /></p>
                    <p> <input type="text" name="email_address" placeholder="Email address*" /></p>
                    <p> <input type="text" name="residential_status" placeholder="Residential Status*" /></p>
                </div>


                <div class="tab">
                    <h3 class="fs-title">Bank Information<small class="text-success">(We are Taxring)</small>
                    </h3>

                    <div class="field_wrapper">
                        <div>
                            <input type="text" name="ifsc_code[]" placeholder="IFSC Code" />
                            <input type="text" name="bank_name[]" placeholder="Bank Name" />
                            <input type="text" name="account_number[]" placeholder="Account Number" />

                            Click Below Account foTickr refund<input class="form-control" type="radio"
                                name="tick_account_for_refund[]" value="1" id=""><br>

                            <a href="javascript:void(0);" class="add_button" title="Add field">Add more Bank</a>
                        </div>
                    </div>
                </div>


                <div class="tab">
                    <h3 class="fs-title">Employer & Tax filing Information<small class="text-success">(We are Taxring)</small>
                    </h3>
                    <p><input type="text" name="employer_category" placeholder="Employer Category*" required /></p>


                    <p><select name="filing_status" id="">
                        <option value="original">Original</option>
                        <option value="revised">Revised</option>
                        <option value="defective_u/s_139(9)">Defective u/s 139(9)</option>
                    </select></p>


                    <p><input type="text" name="original_acknowledgement_no" placeholder="Original Acknowledgement No*"
                            required /></p>
                    <p><input type="date" name="date_of_filling_of_original_return"
                            placeholder="Date of Filing of Original Return*" required /></p>
                    <p><input type="text" name="notice_no" placeholder="Notice No*" required /></p>
                    <textarea name="comment" id="" cols="15" rows="5" placeholder="Comment"></textarea>


                    <div>
                        <label for="upload_form_1616a">Upload Form-1616A (if any) See Image</label>
                        <p><input id="fill_pancard" type="text" readonly><br>
                        <p><input type="text" name="efilling_password" placeholder="Enter your login Credential Efilling">
                        <p><input type="file" name="upload_form_1616a" /></p>

                    </div>

                    <div>
                        <label for="other_document">Other Documents (if any)</label>
                        <p><input type="file" name="other_document" /></p>

                    </div>
                </div>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>

        </div>
    </div>



    <script type="text/javascript">

        function fillvaluepancard(val){
            console.log('prateek');
            document.getElementById('fill_pancard').value = val;
        }

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

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>


@endsection
