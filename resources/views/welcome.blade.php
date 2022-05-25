@extends('site-layout')
@section('banner')
<!-- Top Banner -->
<div class="banner-area">
    <div class="banner banner--animated-content">

        <!-- Single Banner -->
        {{-- <div class="banner__single banner__single--style2 bg-image--2"> --}}

        <div class="banner-cls img-thumbnail"
            style="background-image: url(//taxring.com/korde/images/bg/2.jpg); background-repeat: round;">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="banner__single__content color--white">
                            <h1 class="color--theme"></h1>
                            <h1>
                                <strong>E-FILED 1700+ TAX RETURN FROM
                                    <span class="color--theme">INSTA E-FILING FORM</span>
                                    WITH CLIENT
                                    <span class="color--theme">SATISFACTION</span>
                                </strong>
                            </h1>
                            <a href="{{ route('insta.efiling') }}" class="cr-btn">
                                <span>Start Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Single Banner -->

        {{-- <!-- Single Banner -->
				<div class="banner__single banner__single--style2 bg-image--1" data-black-overlay="6">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-12">
								<div class="banner__single__content">
									<h1 class="color--theme">WITH THE BEST TEAM</h1>
									<h1>
										<strong>SOLVE 350+ TAX PROBLEMS WITH CLIENTS
											<span class="color--theme">SATISFACTION</span>
										</strong>
									</h1>
									<a href="#" class="cr-btn">
										<span>Contact Now</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //Single Banner -->

				<!-- Single Banner -->
				<div class="banner__single banner__single--style2 bg-image--3" data-black-overlay="6">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-12">
								<div class="banner__single__content color--white">
									<h1 class="color--theme">WITH THE BEST TEAM</h1>
									<h1>
										<strong>SOLVE 350+ TAX PROBLEMS WITH CLIENTS
											<span class="color--theme">SATISFACTION</span>
										</strong>
									</h1>
									<a href="contact.html" class="cr-btn">
										<span>Contact Now</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //Single Banner --> --}}

    </div>
</div>
<!-- //Top Banner -->
@stop
@section('content')
<!-- Page Conent -->


<!-- About Area -->
<section id="about-area" class="cr-section about-area bg--white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 offset-lg-1">
                <div class="about-area__content2 text-center">
                    <h4>WE ARE “
                        <span class="color--theme">Taxring</span>”
                    </h4>
                    <h3 class="cd-headline cx-heading slide">PROVIDE BEST TAX SOLUTION FOR YOUR
                        <span class="color--theme cd-words-wrapper cd-words-wrapper-2">
                            <b class="is-visible">Business</b>
                            <b>Performance</b>
                            <b>Success</b>
                        </span>
                        TO GROWUP
                    </h3>
                    <div>
                        <p class="text-left">{!! $page->short_description !!}</p>
                    </div>
                    <a href="{{ route('aboutus') }}" class="cr-readmore">
                        <span>Read More</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="about-area__image2">
                    <img src="{{ asset('korde/images/about/about-thumbnail-3.png') }}" alt="about area image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //About Area -->

@include('site.partials.homepage-blocks')

@stop
@section('script')
<script type="text/javascript">
var s_gender = 'pratek';


function toseventeen(selected_gender) {
    if (selected_gender == 'male') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;


        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 250000;

            var new1_total_taxable_income = new_total_taxable_income * 10 / 100;

            if (new1_total_taxable_income > 5000) {
                var new2 = new1_total_taxable_income - 5000;
                var education_cess = new2 * 3 / 100;
                var tax_laiblity = new2 + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            } else {
                var education_cess = new1_total_taxable_income * 3 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

            }
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 25000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 125000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'female') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 250000;

            var new1_total_taxable_income = new_total_taxable_income * 10 / 100;

            if (new1_total_taxable_income > 5000) {
                var new2 = new1_total_taxable_income - 5000;
                var education_cess = new2 * 3 / 100;
                var tax_laiblity = new2 + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            } else {
                var education_cess = new1_total_taxable_income * 3 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

            }
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 25000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 125000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 300000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 300000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 300000;
            var new1_total_taxable_income = new_total_taxable_income * 10 / 100;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 20000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 120000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }

    if (selected_gender == 'super_senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        // if (gross_income > 250000 && gross_income <= 500000) {
        //     var total_taxable_income = gross_income - deduction;
        //     document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

        //     var new_total_taxable_income = total_taxable_income - 250000;
        //     var new1_total_taxable_income = new_total_taxable_income * 10/100 - 5000;
        //     var education_cess = new1_total_taxable_income * 3/100;
        //     var tax_laiblity = new1_total_taxable_income + education_cess;
        //     console.log(tax_laiblity);
        document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        // }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 100000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }
}







function toeighteen(selected_gender) {
    if (selected_gender == 'male') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;


        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            console.log(total_taxable_income, "prateek");
            if (total_taxable_income <= 350000) {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;

                if (new1_total_taxable_income > 2500) {
                    var new2 = new1_total_taxable_income - 2500;
                    var education_cess = new2 * 3 / 100;
                    var tax_laiblity = new2 + education_cess;
                    console.log(tax_laiblity);
                    document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
                } else {
                    var education_cess = new1_total_taxable_income * 3 / 100;
                    var tax_laiblity = new1_total_taxable_income + education_cess;
                    console.log(tax_laiblity);
                    document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

                }

            } else {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
                var education_cess = new1_total_taxable_income * 3 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            }

        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            //console.log(new1_total_taxable_income, "prateek");

            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 112500;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'female') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            console.log(total_taxable_income, "prateek");
            if (total_taxable_income <= 350000) {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;

                if (new1_total_taxable_income > 2500) {
                    var new2 = new1_total_taxable_income - 2500;
                    var education_cess = new2 * 3 / 100;
                    var tax_laiblity = new2 + education_cess;
                    console.log(tax_laiblity);
                    document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
                } else {
                    var education_cess = new1_total_taxable_income * 3 / 100;
                    var tax_laiblity = new1_total_taxable_income + education_cess;
                    console.log(tax_laiblity);
                    document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

                }

            } else {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
                var education_cess = new1_total_taxable_income * 3 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            }

        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            //console.log(new1_total_taxable_income, "prateek");

            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 112500;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 300000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 300000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 300000;
            var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 10000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 110000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }

    if (selected_gender == 'super_senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        // if (gross_income > 250000 && gross_income <= 500000) {
        //     var total_taxable_income = gross_income - deduction;
        //     document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

        //     var new_total_taxable_income = total_taxable_income - 250000;
        //     var new1_total_taxable_income = new_total_taxable_income * 10/100 - 5000;
        //     var education_cess = new1_total_taxable_income * 3/100;
        //     var tax_laiblity = new1_total_taxable_income + education_cess;
        //     console.log(tax_laiblity);
        document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        // }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 100000;
            var education_cess = new1_total_taxable_income * 3 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }
}



function toninteen(selected_gender) {
    if (selected_gender == 'male') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;


        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            if (total_taxable_income <= 350000) {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100 - 2500;
                var education_cess = new1_total_taxable_income * 4 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            } else {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
                var education_cess = new1_total_taxable_income * 4 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            }

        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            //console.log(new1_total_taxable_income, "prateek");

            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 112500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'female') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            if (total_taxable_income <= 350000) {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100 - 2500;
                var education_cess = new1_total_taxable_income * 4 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            } else {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
                var education_cess = new1_total_taxable_income * 4 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            }

        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            //console.log(new1_total_taxable_income, "prateek");

            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 112500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            if (total_taxable_income <= 350000) {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100 - 2500;
                var education_cess = new1_total_taxable_income * 4 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            } else {
                var new_total_taxable_income = total_taxable_income - 250000;
                var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
                var education_cess = new1_total_taxable_income * 4 / 100;
                var tax_laiblity = new1_total_taxable_income + education_cess;
                console.log(tax_laiblity);
                document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
            }

        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 10000;
            //console.log(new1_total_taxable_income, "prateek");

            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 110000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }

    if (selected_gender == 'super_senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        // if (gross_income > 250000 && gross_income <= 500000) {
        //     var total_taxable_income = gross_income - deduction;
        //     document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

        //     var new_total_taxable_income = total_taxable_income - 250000;
        //     var new1_total_taxable_income = new_total_taxable_income * 10/100 - 5000;
        //     var education_cess = new1_total_taxable_income * 3/100;
        //     var tax_laiblity = new1_total_taxable_income + education_cess;
        //     console.log(tax_laiblity);
        document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        // }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 100000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }
}

// $(document).on('change', '[name="taxcalc_business_area"]', function(){
// 	var val = $(this).val();
// })
$(document).on('change', '[name="taxcalc_country_residence"]', function() {
    var Userinput = $(this).val();
    var genderType = $('[name="taxcalc_business_area"] option:selected').val();
    if (Userinput == '2021-2022-new') {
        totweentyone_new(genderType);
    }

    if (Userinput == '2021-2022-old') {
        totweentyone_old(genderType);

    }

    if (Userinput == '2020-2021') {
        totweenty(genderType);


    }

    if (Userinput == '2019-2020') {
        toninteen(genderType);

    }

    if (Userinput == '2018-2019') {
        toeighteen(genderType);

    }

    if (Userinput == '2017-2018') {
        toseventeen(genderType);
    }
})


function totweenty(selected_gender) {
    if (selected_gender == 'male') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;


        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            // var new_total_taxable_income = total_taxable_income - 250000;
            // var new1_total_taxable_income = new_total_taxable_income * 5 / 100;
            // var education_cess = new1_total_taxable_income * 4 / 100;
            // var tax_laiblity = new1_total_taxable_income + education_cess;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 112500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'female') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 112500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 300000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 300000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 10000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 110000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }

    if (selected_gender == 'super_senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        // if (gross_income > 250000 && gross_income <= 500000) {
        //     var total_taxable_income = gross_income - deduction;
        //     document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

        //     var new_total_taxable_income = total_taxable_income - 250000;
        //     var new1_total_taxable_income = new_total_taxable_income * 10/100 - 5000;
        //     var education_cess = new1_total_taxable_income * 3/100;
        //     var tax_laiblity = new1_total_taxable_income + education_cess;
        //     console.log(tax_laiblity);
        document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        // }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 100000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }
}



function totweentyone_old(selected_gender) {
    if (selected_gender == 'male') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;


        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 125000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'female') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 12500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 125000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }

    }

    if (selected_gender == 'senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 300000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        if (gross_income > 300000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 10000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 110000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }

    if (selected_gender == 'super_senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;
        }

        // if (gross_income > 250000 && gross_income <= 500000) {
        //     var total_taxable_income = gross_income - deduction;
        //     document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

        //     var new_total_taxable_income = total_taxable_income - 250000;
        //     var new1_total_taxable_income = new_total_taxable_income * 10/100 - 5000;
        //     var education_cess = new1_total_taxable_income * 3/100;
        //     var tax_laiblity = new1_total_taxable_income + education_cess;
        //     console.log(tax_laiblity);
        document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        // }

        if (gross_income > 500000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 100000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;

        }
    }
}


function totweentyone_new(selected_gender) {

    if (selected_gender == 'male') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;


        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 750000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 10 / 100 + 12500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity, education_cess);
        }

        if (gross_income > 750000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 750000;
            var new1_total_taxable_income = new_total_taxable_income * 15 / 100 + 25000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000 && gross_income <= 1250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 125000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1250000 && gross_income <= 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1250000;
            var new1_total_taxable_income = new_total_taxable_income * 25 / 100 + 187500;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1500000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 450000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

    }

    if (selected_gender == 'female') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 750000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 10 / 100 + 25000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity, education_cess);
        }

        if (gross_income > 750000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 750000;
            var new1_total_taxable_income = new_total_taxable_income * 15 / 100 + 75000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000 && gross_income <= 1250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 150000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1250000 && gross_income <= 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1250000;
            var new1_total_taxable_income = new_total_taxable_income * 25 / 100 + 250000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1500000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 450000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

    }

    if (selected_gender == 'senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 750000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 10 / 100 + 25000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity, education_cess);
        }

        if (gross_income > 750000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 750000;
            var new1_total_taxable_income = new_total_taxable_income * 15 / 100 + 75000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000 && gross_income <= 1250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 150000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1250000 && gross_income <= 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1250000;
            var new1_total_taxable_income = new_total_taxable_income * 25 / 100 + 250000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1500000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 450000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }
    }

    if (selected_gender == 'super_senior_citizen') {
        var gross_income = document.getElementById('taxcalc_employee_counter').value;
        var deduction = document.getElementById('taxcalc_tax_year').value;

        if (gross_income <= 250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;
            var tax_laiblity = 0;

        }

        if (gross_income > 250000 && gross_income <= 500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var tax_laiblity = 0;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 500000 && gross_income <= 750000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 500000;
            var new1_total_taxable_income = new_total_taxable_income * 10 / 100 + 25000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity, education_cess);
        }

        if (gross_income > 750000 && gross_income <= 1000000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 750000;
            var new1_total_taxable_income = new_total_taxable_income * 15 / 100 + 75000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1000000 && gross_income <= 1250000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1000000;
            var new1_total_taxable_income = new_total_taxable_income * 20 / 100 + 150000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1250000 && gross_income <= 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1250000;
            var new1_total_taxable_income = new_total_taxable_income * 25 / 100 + 250000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }

        if (gross_income > 1500000) {
            var total_taxable_income = gross_income - deduction;
            document.getElementById('taxcalc-yearly-income').value = total_taxable_income;

            var new_total_taxable_income = total_taxable_income - 1500000;
            var new1_total_taxable_income = new_total_taxable_income * 30 / 100 + 450000;
            var education_cess = new1_total_taxable_income * 4 / 100;
            var tax_laiblity = new1_total_taxable_income + education_cess;
            console.log(tax_laiblity);
            document.getElementById('taxcalc_total_calculation').value = tax_laiblity;
        }
    }
}
</script>
@endsection