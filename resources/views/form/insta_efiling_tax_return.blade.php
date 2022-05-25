@extends('site-layout')

@section('banner')
	<!-- Breadcrumb Area -->
	<div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-6 col-md-8">
					<div class="cr-breadcrumb">
						<ul class="cr-breadcrumb__pagination">
							<li><a href="{{url('/')}}">Home</a></li>
							<li>Insta E-filing</li>
						</ul>
						<h1>Insta E-filing of Income Tax Return</h1>
						{{-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
							totam rem </p> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--// Breadcrumb Area -->
@endsection
@section('content')

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



<!-- MultiStep Form -->


<div class="insta-efiling" style="background-color: #333982">
    <div class="header__logo" style="padding-top: 40px; padding-left: 10%; color:white;">
    
        <h2 style="margin-left: 35%; font-size: 1.5rem;">Insta E-filing of Income Tax Return</h2>
    </div>
    <div class="row" >
        <div class="col-md-6 mt-5 ml-5">
            <img class="card" src="{{asset('korde/images/bg/insta_efiling2.jpeg')}}" width="90%" height="96%" alt="">
        </div>
        <div class="col-md-5 card mt-5 mb-5" >
            <form id="msform" method="POST" action="{{ route('insta.efiling.submit') }}" enctype="multipart/form-data">
                @csrf
                <!-- progressbar -->
                <!-- fieldsets -->
                <h2 class="fs-title">Personal Information</h2>
                <h3 class="fs-subtitle" style="color: rgb(117, 161, 117)">We are Taxring</h3>
                <hr>

                <div class="row mb-4">
                    <select onchange="selection(this.value)" class="col-md-4" name="are_you" value="{{ old('are_you') }}" required>
                        <option value="">Are you*</option>
                        <option value="salaried" >Salaried</option>
                        <option value="pensioners">Pensioners</option>
                        <option value="self_employed_business">Self Employed Business</option>
                        <option value="self_employed_professional">Self Employed Professional</option>
                        <option value="other">Other</option>
        
                    </select>

                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="pancard">Pan number</label>
                    <input class="col-md-7 " type="text" name="pancard" placeholder="Pan number" value="{{ old('pancard') }}" required />
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Income Tax Login</label>
                    <input class="col-md-7 " type="text" name="income_tax_password" placeholder="Income Tax Login Password" required />
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="name">Name on Pancard</label>
                    <input class="col-md-7 " type="text" name="name" placeholder="Name as per Pancard" required />
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Date of Birth</label>
                    <input class="col-md-7 " type="date" name="dob" placeholder="Date of Birth" required/>
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Father Name</label>
                    <input class="col-md-7 " type="text" name="father_name" placeholder="Father Name" required />
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Email ID</label>
                    <input type="text" class="col-md-7 " name="email" placeholder="Email ID" required/>
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Mobile no.</label>
                    <input type="text" class="col-md-7 " name="mobile_no" placeholder="Mobile No." required/>
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Aadhar Number </label>
                    <input type="text" class="col-md-7 " name="addhar_number" placeholder="12 digit Aadhar Number " required/>
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Bank Account Number</label>
                    <input type="text" class="col-md-7 " name="bank_information" placeholder="Bank Account Number" required/>
                </div>

                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">IFSC Code</label>
                    <input type="text" class="col-md-7 " name="ifsc_code" placeholder="IFSC Code" required/>
                </div>


                <div class="row">
                    <label class="col-md-4 text-left" for="income_tax_password">Comment</label>
                    <textarea class="col-md-7 " name="comment" id="" cols="15" rows="5" placeholder="Comment" ></textarea>
                </div>

                <label class="mt-3" id="change_text" for="document[]"> Documents <small>(multiple selection/use ctrl+click)</small></label>
                <input type="file" name="document[]" style="background-color: white" placeholder="document" multiple>

                <div class="row custom-dk">
                    <p id="show_price"  class="col-md-6 mt-3 text-success">Amount : </p>

                    <input id="total_amt" type="hidden" name = "total_amount" value="">
                    <input type="submit" class="next action-button" value="Submit & Pay " />

                </div>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">

function selection(value){
    if (value == 'salaried') {
        document.getElementById('change_text').innerHTML = 'FORM16 <small>(multiselection /other document /use ctrl+click) </small>';
        document.getElementById('show_price').innerHTML = 'Amount : ₹749';
        document.getElementById('total_amt').value = 749;

    }

    if (value == 'pensioners') {
        document.getElementById('change_text').innerHTML = 'Pension Income Details in PDF <small>(multiselection /other document /use ctrl+click) </small>';
        document.getElementById('show_price').innerHTML = 'Amount : ₹749';
        document.getElementById('total_amt').value = 749;
    }

    if (value == 'self_employed_business') {
        document.getElementById('change_text').innerHTML = 'Last Year Balance Sheet.P/L and Computation <small>(multiselection /other document /use ctrl+click) </small><br>Bank Statement (1-Apr2020 to 31-March2021)';
        document.getElementById('show_price').innerHTML = 'Amount : ₹1499';
        document.getElementById('total_amt').value = 1449;
    }

    if (value == 'self_employed_professional') {
        document.getElementById('change_text').innerHTML = 'Last Year Balance Sheet.P/L and Computation <small>(multiselection /other document /use ctrl+click) </small><br>Bank Statement (1-Apr2020 to 31-March2021)';
        document.getElementById('show_price').innerHTML = 'Amount : ₹1499';
        document.getElementById('total_amt').value = 1449;
    }

    if (value == 'other') {
        document.getElementById('change_text').innerHTML = 'Other If any <small>(multiselection /other document /use ctrl+click) </small>';
        document.getElementById('show_price').innerHTML = 'Amount : ₹999';
        document.getElementById('total_amt').value = 999;
    }
}

</script>

<!-- /.MultiStep Form -->
@endsection
