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
      background-position: center center;
      background-size: cover;
      padding: 40px;
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

   .fixTop {
      background-color: #d70b0b;
      font-size: 2vw;
      padding: 0.5vw;
      color: #f8f4f4;
      margin-bottom: 10px;
      font-weight: 700;
   }
</style>

<section class="wizard-section">
   <div class="row no-gutters">
      <div class="col-lg-6 col-md-6">
         <div class="wizard-content-left d-flex justify-content-center align-items-center">

            <div class="col-md-12">

               <div class="col-md-12 top-100" id="instructions">
                  <div class="col-md-12 regi-panel2 div-shadow-box bord-rad top-20">
                     <div class="col-md-12 registration-title border-none text-center fixTop">Instructions</div>
                  </div>
                  <div class="clb"></div>
                  <div class="col-md-12 form-bg2 div-shadow-box">
                     <div class="col-md-12 instr-text">
                        <strong>1. Aadhaar Number :</strong> The Aadhaar number shall be of the proprietor in the case
                        of a proprietorship firm, of the managing partner in the case of a partnership firm and of a
                        karta in the case of a Hindu Undivided Family (HUF). ("यहां 12 अंकों का आधार नंबर भरें।")
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>2. Name of Applicant :</strong> Fill name of Applicant as mentioned on the Aadhaar
                        Card.<br>
                        "आधार कार्ड में उल्लिखित आवेदक का नाम भरें।"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>3. Social Category : </strong> Select the Social Category of applicant from the given
                        options.<br>
                        "आवेदक की सामाजिक श्रेणी का चयन करें।"
                     </div>
                     <div class="clb"></div>
                     <!-- <div class="col-md-12 instr-text top-15">
                   <strong>4. Gender :</strong> Select the gender from provided option<br>
             "आवेदक का लिंग चुनें।"
                </div>
                <div class="clb"></div> 
                <div class="col-md-12 instr-text top-15">
                   <strong>5. Physically Handicapped :</strong> Select the status from provided options<br>
                      "चयन करें कि आवेदक शारीरिक रूप से विकलांग है या नहीं।"
          </div>
                <div class="clb"></div>-->
                     <div class="col-md-12 instr-text top-15">
                        <strong>4. Type of Organization :</strong> Select the type of organization from the given
                        options which will get printed on MSME Certificate.<br>
                        "दिए गए विकल्पों में से संगठन के प्रकार का चयन करें।"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>PAN: Fill 10 Digit PAN Number</strong> Business PAN Number (In case of proprietorship
                        Submit owner's PAN number) <br>
                        "यहां बिजनेस पैन का उल्लेख करें। प्रोप्राइटरशिप के मामले में प्रोप्राइटर का पैन उल्लेख करें।"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>5. Name of Enterprise / Business : </strong> Fill the name of Business / Enterprise
                        which will get printed on MSME Certificate.<br>
                        "यहां अपने व्यवसाय के नाम का उल्लेख करें। यह नाम MSME प्रमाणपत्र पर मुद्रित किया जाएगा।"<br>
                        Note: Detail's in Name of Enterprise/Business will be verified &amp; picked up by system from
                        the GSTIN portal on the basis of given PAN No. If you are not having PAN then will be filled
                        manually by you.
                     </div>
                     <div class="clb"></div>
                     <!--     <div class="col-md-12 instr-text top-15">
                   <strong>8.Have you filled Financial Year (2018-19) ITR?</strong> If you filled ITR select yes otherwise no <br> 
             "क्या आपने वित्तीय वर्ष (2018 - 19) ITR भरा है"<br>
             (<strong>ITR Type</strong> Select ITR type if you filled ITR)<br> 
   
          </div>
                <div class="clb"></div>
             
                <div class="col-md-12 instr-text top-15">
                   <strong>9. Do you have GSTIN Number?</strong> If you have GSTIN number then select yes otherwise no <br> 
             "क्या आपके पास GSTIN नंबर है?"<br>
             Note- GSTIN Number are mandatory for Udyam Registration from 01.04.2021. You are advised to apply for GSTIN Number immediately and update the same on this website by 31.03.2021, to avoid suspension of Udyam Registration.
          </div>
                <div class="clb"></div> -->

                     <div class="col-md-12 instr-text top-15">
                        <strong>Location of Plant :</strong> Please fill the location address properly <br>
                        "दिए गए क्षेत्रों में ठीक से विनिर्माण सुविधा का पता लिखे |"<br>
                        Note: Details in Location of Plant (Address) will be verified &amp; picked up by system from the
                        GSTIN portal on the basis of given PAN No. If you are not havingPAN then will be filled manually
                        by you.
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>6. Office Address :</strong> Please provide office address.<br>
                        "दिए गए क्षेत्रों में ठीक से आधिकारिक पता लिखे |"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>7. Date of Incorporation / Registration :</strong> Fill the date of Incorporation /
                        Registration of Business which will get printed on MSME Certificate.<br>
                        "व्यवसाय पंजीकरणकी की तारीख का उल्लेख यहां करें।"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>8. Mobile No :</strong> Fill the correct Mobile Number of Applicant <br>
                        "आवेदक का सही मोबाइल नंबर यहां लिखें। "
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>9. Mail ID :</strong> Fill the correct Mail ID of Applicant<br>
                        "यहां अपनी सही ईमेल आईडी का उल्लेख करें।"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>15. Bank Account Number :</strong> Fill the Applicant’s bank account number.<br>
                        "यहां अपने बैंक खाता नंबर का उल्लेख करें।"
                     </div>
                     <div class="clb"></div>
                     <div class="col-md-12 instr-text top-15">
                        <strong>16. Bank IFSC Code :</strong> Fill the Applicant Bank IFSC Code. The IFSC code is
                        printed on the Cheque Books.<br>
                        "अपने बैंक IFSC कोड को यहां लिखें।"
                     </div>
                     <div class="clb"></div>
                     <!--  <div class="col-md-12 instr-text top-15">
                   <strong>14. Whether Production/Business Commenced :</strong> Select Production/Business Commenced or not<br>
                "क्या आपका व्यवसाय शुरू हो गया है? "<br>
                <strong>Date of Commencement of Business :</strong> Fill the date of Commencement of Business which will get printed on MSME Certificate.<br>
                "व्यवसाय शुरू करने की तारीख का उल्लेख यहां करें।"
          </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15">
                   <strong>15. Bank Account Number :</strong> Fill  the Applicant’s bank account number.<br>
                "यहां अपने बैंक खाता नंबर का उल्लेख करें।"
                </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15">
                   <strong>16. Bank IFSC Code :</strong> Fill the Applicant Bank IFSC Code. The IFSC code is printed on the Cheque Books.<br>
                "अपने बैंक IFSC कोड को यहां लिखें।"
          </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15">
                   <strong>17. Main Business Activity of Enterprise :</strong> Select the Main Business activity from the given options.<br>
                "अपनी मुख्य व्यावसायिक गतिविधि चुनें।"
                </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15">
                   <strong>18. NIC 2 Digit Code :</strong>Select the 2 Digit NIC Code from the given options considering your business activity. <br>
                "यहां अपनी व्यावसायिक गतिविधि से संबंधित 2 अंकों का एनआईसी कोड चुनें।"
                </div>
                <div class="clb"></div> -->
                     <div class="col-md-12 instr-text top-15">
                        <strong>10. Additional details about Business :</strong> Fill Additional details about business.
                        (For example – manufacturing of Food Products, Computer programing, Software development) <br>
                        "व्यवसाय के बारे में अतिरिक्त जानकारी भरें।"
                     </div>
                     <div class="clb"></div>
                     <!--  <div class="col-md-12 instr-text top-15">
                   <strong>20. Number of employees :</strong> Fill total number of people been employed. <br>
                "आपके संगठन में कार्यरत कर्मचारियों की संख्या का उल्लेख करें।"
                </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15">
                   <strong>21. Investment in Plant & Machinery / Equipment :</strong> Fill the total investment made in Plant, Machinery, and Equipment etc. to start your business. <br>
                "अपने व्यवसाय में किए गए निवेश की कुल राशि भरें।"
                </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15">
                   <strong>22. Turnover Detail's :</strong> Fill the total Turnover of your business. <br>
                "अपने व्यवसाय में किए गए कारोबार की कुल राशि भरें।"
                </div>
                <div class="clb"></div>
                <div class="col-md-12 instr-text top-15" >
                   <strong>23. Attachment :</strong> Attach scan copy of your Aadhaar Card. (jpg,png file &lt; 500KB)<br>
                "अपने आधार कार्ड की स्कैन कॉपी Attach करें। आप अपने आधार कार्ड को ईमेल पर भी भेज सकते हैं।<strong> help@msmeregistration.org 	</strong> <br><br>
                </div> -->
                  </div><br><br>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6 col-md-6">
         <div class="form-wizard">
            <form action="{{route('msmeform.save')}}" method="POST" role="form">
               @csrf
               <div class="form-wizard-header">
                  <p>Udyam / Udyog Aadhar Registration</p>
                  <ul class="list-unstyled form-wizard-steps clearfix">
                     <li class="active"><span>1</span></li>
                     <li><span>2</span></li>
                     <li><span>3</span></li>
                  </ul>
               </div>
               <fieldset class="wizard-fieldset show">
                  <h5>Lifetime Valid Certificate of Udyam/MSME for Manufacturing & Service Industry</h5>
                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="fname" name="aadharName">
                     <label for="bname" class="wizard-form-text-label">
                        1. Aadhaar Number / आधार संख्या*</label>
                     <div class="wizard-form-error"></div>
                  </div>

                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="lname" name="applicantName">
                     <label for="address" class="wizard-form-text-label">2. Name of Entrepreneur/Applicant (उद्यमी का
                        नाम / आधार कार्ड पर मुद्रित आवेदक)*</label>
                     <div class="wizard-form-error"></div>
                  </div>


                  <div class="form-group">
                     <select class="form-control" name="socialCategory">
                        <option value="">3. Social Category / सामाजिक वर्ग:</option>
                        <option value="Genral">Genral</option>
                        <option value="OBC">OBC</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <select class="form-control" name="typeOfOrganistation">
                        <option value="">4. Type of Organisation / संगठन के प्रकार</option>
                        <option value="Proprietorship Firm">Proprietorship Firm</option>
                        <option value="Hindu Undivided Family">Hindu Undivided Family</option>
                        <option value="Partnership Firm">Partnership Firm</option>
                        <option value="Limited Liability Partnership">Limited Liability Partnership</option>
                        <option value="Co-operative Society">Co-operative</option>
                        <option value="Private Limited">Private Limited</option>
                        <option value="Public Limited">Public Limited</option>
                        <option value="Self Help Group">Self Help Group</option>
                        <option value="Society">Society</option>
                        <option value="Trust">Trust</option>
                        <option value="Other">Other</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="lname" name="businessName">
                     <label for="businessName" class="wizard-form-text-label">5. Name of Enterprise/Business / उद्यम का नाम*</label>
                     <div class="wizard-form-error"></div>
                  </div>




                  <div class="form-group clearfix">
                     <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>

                  </div>
               </fieldset>
               <fieldset class="wizard-fieldset">
                  <h5>Account Information</h5>
                  <div class="form-group">
                     <label for="date">7. Date of Incorporation / Registration | व्यवसाय पंजीकरणकी तारीख</label>
                     <input type="date" name="date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" placeholder="">
                     <div class="wizard-form-error"></div>
                  </div>
                  
                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="fname" name="mobileNo">
                     <label for="mobileNo" class="wizard-form-text-label">8. Mobile No / मोबाइल नंबर +91-*</label>
                     <div class="wizard-form-error"></div>
                  </div>

                  <div class="form-group">
                     <input type="email" class="form-control wizard-required" id="lname" name="email">
                     <label for="email" class="wizard-form-text-label">9. Email ID / ईमेल*</label>
                     <div class="wizard-form-error"></div>
                  </div>

                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="username" name="bankAccountNo">
                     <label for="bankAccountNo" class="wizard-form-text-label">10. Bank Account Number / बैंक खाता संख्या*</label>
                     <div class="wizard-form-error"></div>
                  </div>

                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="email" name="ifscCode">
                     <label for="ifscCode" class="wizard-form-text-label">11. IFSC Code / आईएफएस कोड*</label>
                     <div class="wizard-form-error"></div>
                  </div>

                  <div class="form-group">
                     <input type="text" class="form-control wizard-required" id="pwd" name="additionalBusiness">
                     <label for="additionalBusiness" class="wizard-form-text-label">12. Additional details about Business /व्यापार के बारे में अतिरिक्त जानकारी*</label>
                     <div class="wizard-form-error"></div>
                  </div>


                  <div class="form-group clearfix">
                     <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                     <button type="submit" class="form-wizard-submit float-right">Submit</button>
                     {{-- <a type="submit" href="javascript:;" class="form-wizard-submit float-right">Submit</a> --}}
                  </div>
               </fieldset>
            
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