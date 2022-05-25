@extends('site-layout')

@section('content')


<style>
  body {
    background-color: #ffffff;
    color: #444444;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    margin: 0;
    padding: 0;
  }

  .wizard-content-left {
    background-blend-mode: darken;
    background-color: rgba(0, 0, 0, 0.45);
    background-image: url("https://i.ibb.co/X292hJF/form-wizard-bg-2.jpg");
    background-position: center center;
    background-size: cover;
    height: 100vh;
    padding: 30px;
  }

  .wizard-content-left h1 {
    color: #ffffff;
    font-size: 38px;
    font-weight: 600;
    padding: 12px 20px;
    text-align: center;
  }

  .form-wizard {
    color: #888888;
    padding: 30px;
  }

  .form-wizard .wizard-form-radio {
    display: inline-block;
    margin-left: 5px;
    position: relative;
  }

  .form-wizard .wizard-form-radio input[type="radio"] {
    -webkit-appearance: none;
    -moz-appearance: none;
    -ms-appearance: none;
    -o-appearance: none;
    appearance: none;
    background-color: #dddddd;
    height: 25px;
    width: 25px;
    display: inline-block;
    vertical-align: middle;
    border-radius: 50%;
    position: relative;
    cursor: pointer;
  }

  .form-wizard .wizard-form-radio input[type="radio"]:focus {
    outline: 0;
  }

  .form-wizard .wizard-form-radio input[type="radio"]:checked {
    background-color: #fb1647;
  }

  .form-wizard .wizard-form-radio input[type="radio"]:checked::before {
    content: "";
    position: absolute;
    width: 10px;
    height: 10px;
    display: inline-block;
    background-color: #ffffff;
    border-radius: 50%;
    left: 1px;
    right: 0;
    margin: 0 auto;
    top: 8px;
  }

  .form-wizard .wizard-form-radio input[type="radio"]:checked::after {
    content: "";
    display: inline-block;
    webkit-animation: click-radio-wave 0.65s;
    -moz-animation: click-radio-wave 0.65s;
    animation: click-radio-wave 0.65s;
    background: #000000;
    content: '';
    display: block;
    position: relative;
    z-index: 100;
    border-radius: 50%;
  }

  .form-wizard .wizard-form-radio input[type="radio"]~label {
    padding-left: 10px;
    cursor: pointer;
  }

  .form-wizard .form-wizard-header {
    text-align: center;
  }

  .form-wizard .form-wizard-next-btn,
  .form-wizard .form-wizard-previous-btn,
  .form-wizard .form-wizard-submit {
    background-color: #d65470;
    color: #ffffff;
    display: inline-block;
    min-width: 100px;
    min-width: 120px;
    padding: 10px;
    text-align: center;
  }

  .form-wizard .form-wizard-next-btn:hover,
  .form-wizard .form-wizard-next-btn:focus,
  .form-wizard .form-wizard-previous-btn:hover,
  .form-wizard .form-wizard-previous-btn:focus,
  .form-wizard .form-wizard-submit:hover,
  .form-wizard .form-wizard-submit:focus {
    color: #ffffff;
    opacity: 0.6;
    text-decoration: none;
  }

  .form-wizard .wizard-fieldset {
    display: none;
  }

  .form-wizard .wizard-fieldset.show {
    display: block;
  }

  .form-wizard .wizard-form-error {
    display: none;
    background-color: #d70b0b;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 2px;
    width: 100%;
  }

  .form-wizard .form-wizard-previous-btn {
    background-color: #fb1647;
  }

  .form-wizard .form-control {
    font-weight: 300;
    height: auto !important;
    padding: 15px;
    color: #888888;
    background-color: #f1f1f1;
    border: none;
  }

  .form-wizard .form-control:focus {
    box-shadow: none;
  }

  .form-wizard .form-group {
    position: relative;
    margin: 25px 0;
  }

  .form-wizard .wizard-form-text-label {
    position: absolute;
    left: 10px;
    top: 16px;
    transition: 0.2s linear all;
  }

  .form-wizard .focus-input .wizard-form-text-label {
    color: #d65470;
    top: -18px;
    transition: 0.2s linear all;
    font-size: 12px;
  }

  .form-wizard .form-wizard-steps {
    margin: 30px 0;
  }

  .form-wizard .form-wizard-steps li {
    width: 25%;
    float: left;
    position: relative;
  }

  .form-wizard .form-wizard-steps li::after {
    background-color: #f3f3f3;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    border-bottom: 1px solid #dddddd;
    border-top: 1px solid #dddddd;
  }

  .form-wizard .form-wizard-steps li span {
    background-color: #dddddd;
    border-radius: 50%;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    position: relative;
    text-align: center;
    width: 40px;
    z-index: 1;
  }

  .form-wizard .form-wizard-steps li:last-child::after {
    width: 50%;
  }

  .form-wizard .form-wizard-steps li.active span,
  .form-wizard .form-wizard-steps li.activated span {
    background-color: #d65470;
    color: #ffffff;
  }

  .form-wizard .form-wizard-steps li.active::after,
  .form-wizard .form-wizard-steps li.activated::after {
    background-color: #d65470;
    left: 50%;
    width: 50%;
    border-color: #d65470;
  }

  .form-wizard .form-wizard-steps li.activated::after {
    width: 100%;
    border-color: #d65470;
  }

  .form-wizard .form-wizard-steps li:last-child::after {
    left: 0;
  }

  .form-wizard .wizard-password-eye {
    position: absolute;
    right: 32px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
  }

  @keyframes click-radio-wave {
    0% {
      width: 25px;
      height: 25px;
      opacity: 0.35;
      position: relative;
    }

    100% {
      width: 60px;
      height: 60px;
      margin-left: -15px;
      margin-top: -15px;
      opacity: 0.0;
    }
  }

  @media screen and (max-width: 767px) {
    .wizard-content-left {
      height: auto;
    }
  }
</style>

<section class="wizard-section">
  <div class="row no-gutters">
    <div class="col-lg-6 col-md-6">
      <div class="wizard-content-left d-flex justify-content-center align-items-center">
        <h1>Fresh GST Application Form | Taxpayer</h1>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <div class="form-wizard">
        <form action="{{route('gstsubmit')}}" method="POST" role="form">
          @csrf
          <div class="form-wizard-header">
            <p>Fill all form field to go next step</p>
            <ul class="list-unstyled form-wizard-steps clearfix">
              <li class="active"><span>1</span></li>
              <li><span>2</span></li>
              <li><span>3</span></li>
            </ul>
          </div>
          <fieldset class="wizard-fieldset show">
            <h5>Business Details</h5>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="fname" name="bname">
              <label for="bname" class="wizard-form-text-label">
                Trade Name of Business*</label>
              <div class="wizard-form-error"></div>
            </div>
            <h5>Business Address Details</h5>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="lname" name="baddress">
              <label for="address" class="wizard-form-text-label">Address*</label>
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="lname" name="pincode">
              <label for="pincode" class="wizard-form-text-label">
                Pin Code*</label>
              <div class="wizard-form-error"></div>
            </div>

            {{-- <div class="form-control wizard-required part2 partc">
                          <div class="r1head">State/ UT <span>*</span></div>
                          <div class="r1data">
                             <select name="state_prop" id="state_prop" onchange="appendDistrict(this.value,'prop_addr');">
                                <option value="">Select State</option>
                                <option value="AndhraPradesh">Andhra Pradesh</option>
                                <option value="ArunachalPradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chattisgarh">Chattisgarh</option>
                                <option value="DadraandNagarHaveli">Dadra and Nagar Haveli</option>
                                <option value="DamanandDiu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="HimachalPradesh">Himachal Pradesh</option>
                                <option value="Jammuandkashmir">Jammu and kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="MadhyaPradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="TamilNadu">Tamil Nadu</option>
                                <option value="Telengana">Telengana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="UttarPradesh">Uttar Pradesh</option>
                                <option value="Uttrakhand">Uttrakhand</option>
                                <option value="WestBengal">West Bengal</option>
                             </select>
                             <div id="proprieter_error_state_prop" class="clearfix form_rules"> <span class="error"></span> </div>
                          </div>
                       </div>

                       <div class="form-control wizard-required part3 partc">
                        <div class="r1head">District <span>*</span></div>
                        <div class="r1data">
                           <select name="district_prop" id="district_prop">
                              <option value="">Select District</option>
                              <option value="Baksa">Baksa</option>
                              <option value="Barpeta">Barpeta</option>
                              <option value="Biswanath">Biswanath</option>
                              <option value="Bongaigaon">Bongaigaon</option>
                              <option value="Cachar">Cachar</option>
                              <option value="Charaideo">Charaideo</option>
                              <option value="Chirang">Chirang</option>
                              <option value="Darrang">Darrang</option>
                              <option value="Dhemaji">Dhemaji</option>
                              <option value="Dhubri">Dhubri</option>
                              <option value="Dibrugarh">Dibrugarh</option>
                              <option value="Goalpara">Goalpara</option>
                              <option value="Golaghat">Golaghat</option>
                              <option value="Hailakandi">Hailakandi</option>
                              <option value="Hojai">Hojai</option>
                              <option value="Jorhat">Jorhat</option>
                              <option value="Kamrup">Kamrup</option>
                              <option value="Kamrup(Metropolitan)">Kamrup (Metropolitan)</option>
                              <option value="KarbiAnglong">Karbi Anglong</option>
                              <option value="Karimganj">Karimganj</option>
                              <option value="Kokrajhar">Kokrajhar</option>
                              <option value="Lakhimpur">Lakhimpur</option>
                              <option value="Majuli">Majuli</option>
                              <option value="Morigaon">Morigaon</option>
                              <option value="Nagaon">Nagaon</option>
                              <option value="Nalbari">Nalbari</option>
                              <option value="NorthCacharHills">North Cachar Hills</option>
                              <option value="Sadiya">Sadiya</option>
                              <option value="Sibsagar">Sibsagar</option>
                              <option value="Sonitpur">Sonitpur</option>
                              <option value="SouthSalmara-Mankachar">South Salmara-Mankachar</option>
                              <option value="Tinsukia">Tinsukia</option>
                              <option value="Udalguri">Udalguri</option>
                              <option value="WestKarbi-Anglong">West Karbi-Anglong</option>
                           </select>
                           <div id="proprieter_error_district_prop" class="clearfix form_rules"> <span class="error"></span> </div>
                        </div>
                     </div> --}}

            {{-- <div class="form-group">
                            <input type="text" class="form-control wizard-required" id="zcode">
                            <label for="zcode" class="wizard-form-text-label">Zip Code*</label>
                            <div class="wizard-form-error"></div>
                        </div> --}}

            <div class="form-group">
            
                Select Country: <select name="state" id="countySel" size="1">
                  <option value="" selected="selected">Select Country</option>
                </select>
                <br>
                <br>
                Select State: <select name="countrya" id="stateSel" size="1">
                  <option value="" selected="selected">Please select Country first</option>
                </select>
                <br>
                <br>
                Select District: <select name="district" id="districtSel" size="1">
                  <option value="" selected="selected">Please select State first</option>
                </select><br>
              
            </div>


            <div class="form-group clearfix">
              <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>

            </div>
          </fieldset>
          <fieldset class="wizard-fieldset">
            <h5>Account Information</h5>

            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="fname" name="fname">
              <label for="fname" class="wizard-form-text-label">First Name*</label>
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="lname" name="lname">
              <label for="lname" class="wizard-form-text-label">Last Name*</label>
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="username" name="fathername">
              <label for="fathername" class="wizard-form-text-label">Father Name*</label>
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group">
              <input type="email" class="form-control wizard-required" id="email" name="email">
              <label for="email" class="wizard-form-text-label">Email*</label>
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="pwd" name="mobile">
              <label for="mnumber" class="wizard-form-text-label">Mobile No*</label>
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group">
              <input type="date" name="date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
              <div class="wizard-form-error"></div>
            </div>

            <div class="form-group clearfix">
              <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
              <button type="submit" class="form-wizard-submit float-right">Submit</button>
              {{-- <a type="submit" href="javascript:;" class="form-wizard-submit float-right">Submit</a> --}}
            </div>
          </fieldset>
          {{-- <fieldset class="wizard-fieldset">
            <h5>Bank Information</h5>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="bname">
              <label for="bname" class="wizard-form-text-label">Bank Name*</label>
              <div class="wizard-form-error"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="brname">
              <label for="brname" class="wizard-form-text-label">Branch Name*</label>
              <div class="wizard-form-error"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="acname">
              <label for="acname" class="wizard-form-text-label">Account Name*</label>
              <div class="wizard-form-error"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="acon">
              <label for="acon" class="wizard-form-text-label">Account Number*</label>
              <div class="wizard-form-error"></div>
            </div>
            <div class="form-group clearfix">
              <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
              <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
            </div>
          </fieldset> --}}
          {{-- <fieldset class="wizard-fieldset">
            <h5>Payment Information</h5>
            <div class="form-group">
              Payment Type
              <div class="wizard-form-radio">
                <input name="radio-name" id="mastercard" type="radio">
                <label for="mastercard">Master Card</label>
              </div>
              <div class="wizard-form-radio">
                <input name="radio-name" id="visacard" type="radio">
                <label for="visacard">Visa Card</label>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control wizard-required" id="honame">
              <label for="honame" class="wizard-form-text-label">Holder Name*</label>
              <div class="wizard-form-error"></div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control wizard-required" id="cardname">
                  <label for="cardname" class="wizard-form-text-label">Card Number*</label>
                  <div class="wizard-form-error"></div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control wizard-required" id="cvc">
                  <label for="cvc" class="wizard-form-text-label">CVC*</label>
                  <div class="wizard-form-error"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">Expiry Date</div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                  <select class="form-control">
                    <option value="">Date</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                    <option value="">6</option>
                    <option value="">7</option>
                    <option value="">8</option>
                    <option value="">9</option>
                    <option value="">10</option>
                    <option value="">11</option>
                    <option value="">12</option>
                    <option value="">13</option>
                    <option value="">14</option>
                    <option value="">15</option>
                    <option value="">16</option>
                    <option value="">17</option>
                    <option value="">18</option>
                    <option value="">19</option>
                    <option value="">20</option>
                    <option value="">21</option>
                    <option value="">22</option>
                    <option value="">23</option>
                    <option value="">24</option>
                    <option value="">25</option>
                    <option value="">26</option>
                    <option value="">27</option>
                    <option value="">28</option>
                    <option value="">29</option>
                    <option value="">30</option>
                    <option value="">31</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                  <select class="form-control">
                    <option value="">Month</option>
                    <option value="">jan</option>
                    <option value="">Feb</option>
                    <option value="">March</option>
                    <option value="">April</option>
                    <option value="">May</option>
                    <option value="">June</option>
                    <option value="">Jully</option>
                    <option value="">August</option>
                    <option value="">Sept</option>
                    <option value="">Oct</option>
                    <option value="">Nov</option>
                    <option value="">Dec</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                  <select class="form-control">
                    <option value="">Years</option>
                    <option value="">2019</option>
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                    <option value="">2023</option>
                    <option value="">2024</option>
                    <option value="">2025</option>
                    <option value="">2026</option>
                    <option value="">2027</option>
                    <option value="">2028</option>
                    <option value="">2029</option>
                    <option value="">2030</option>
                    <option value="">2031</option>
                    <option value="">2032</option>
                    <option value="">2033</option>
                    <option value="">2034</option>
                    <option value="">2035</option>
                    <option value="">2036</option>
                    <option value="">2037</option>
                    <option value="">2038</option>
                    <option value="">2039</option>
                    <option value="">2040</option>
                  </select>
                </div>
              </div>
            </div>
            
          </fieldset> --}}
        </form>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src="{{asset ('js/stateDistic.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
  src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
</script>

<script>
  jQuery(document).ready(function() {
	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		parentFieldset.find('.wizard-required').each(function(){
			var thisValue = jQuery(this).val();

			if( thisValue == "") {
				jQuery(this).siblings(".wizard-form-error").slideDown();
				nextWizardStep = false;
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
		if( nextWizardStep) {
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery(document).find('.wizard-fieldset').each(function(){
				if(jQuery(this).hasClass('show')){
					var formAtrr = jQuery(this).attr('data-tab-content');
					jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
						if(jQuery(this).attr('data-attr') == formAtrr){
							jQuery(this).addClass('active');
							var innerWidth = jQuery(this).innerWidth();
							var position = jQuery(this).position();
							jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
						}else{
							jQuery(this).removeClass('active');
						}
					});
				}
			});
		}
	});
	//click on previous button
	jQuery('.form-wizard-previous-btn').click(function() {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
	});
	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().addClass("focus-input");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
	});
});

</script>

@endsection