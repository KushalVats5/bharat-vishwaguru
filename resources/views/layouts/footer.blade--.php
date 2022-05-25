<style>
    .checked {
        color: orange;
    }

</style>
<!-- Features Area -->
<section id="features-area" class="cr-section features-area">
    <div class="row no-gutters">

        <!-- Single Feature -->
        <div class="col-lg-4">
            <div class="feature">
                <div class="feature__icon">
                    <span>
                        <i class="flaticon-shield"></i>
                    </span>
                    <span>
                        <i class="flaticon-shield"></i>
                    </span>
                </div>
                <div class="feature__content">
                    <h4 class="wow fadeInUp">
                        <a href="features.html">ENSURE SECURITY</a>
                    </h4>
                    <p class="wow fadeInUp text-justify" data-wow-delay="0.15s">Taxring’s Information Security Client Data Protection program equips client teams with a standardized approach and the security controls and tools necessary to keep data safe.</p>
                </div>
            </div>
        </div>
        <!--// Single Feature -->

        <!-- Single Feature -->
        <div class="col-lg-4">
            <div class="feature active">
                <div class="feature__icon">
                    <span>
                        <i class="flaticon-team"></i>
                    </span>
                    <span>
                        <i class="flaticon-team"></i>
                    </span>
                </div>
                <div class="feature__content">
                    <h4 class="wow fadeInUp">
                        <a href="features.html">EXPERT TEAM</a>
                    </h4>
                    <p class="wow fadeInUp text-justify" data-wow-delay="0.15s">Taxring has lots of Experienced Tax experts/CA Professionals & Legal Consultants. We provide quick and friendly support to our Clients in Pan India. </p>
                </div>
            </div>
        </div>
        <!--// Single Feature -->

        <!-- Single Feature -->
        <div class="col-lg-4">
            <div class="feature">
                <div class="feature__icon">
                    <span>
                        <i class="flaticon-24-hours"></i>
                    </span>
                    <span>
                        <i class="flaticon-24-hours"></i>
                    </span>
                </div>
                <div class="feature__content">
                    <h4 class="wow fadeInUp">
                        <a href="features.html">24/7 SUPPORT</a>
                    </h4>
                    <p class="wow fadeInUp text-justify" data-wow-delay="0.15s">Our experts/CA Professionals will be available (Monday to Friday) from 10:00 AM to 7:00PM for Customer Query. Feel Free mail us support@taxring.com </p>
                </div>
            </div>
        </div>
        <!--// Single Feature -->

    </div>
</section>
<!--// Features Area -->

<!-- Service Area -->
<section id="service-area" class="service-area section-padding--xlg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="section-title">
                    <h4>OUR SERVICES</h4>
                    <h2>PROVIDE BEST
                        <span class="color--theme">SERVICES</span>
                    </h2>
                    <p>Taxring provides excellence Taxation and Other Professional Services across in India.Find a Package Suitable for you Below.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-4 order-1 order-lg-1">
                <div class="service-area__services">
                    <div class="row">

                        <!-- Single Service -->
                        @foreach ($service1[0] as $item)

                            <div class="col-lg-12 col-md-12 wow flipInX">
                                <div class="service">
                                    <div class="service__icon">
                                        <img src="{{ asset('korde/images/icons/service-icon-pie.png') }}"
                                            alt="service icon">
                                    </div>
                                    <div class="service__content">
                                        <h5>
                                            <a
                                                href="{{ route('dynamicService', $item->slug) }}">{{ $item->title }}</a><br><small>(₹
                                                {{ $item->price }})</small>

                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                        </h5>
                                        <p>{!! $item->short_description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--// Single Service -->

                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-3 order-lg-2">
                <div class="service-area__bars text-center">
                    <div class="cr-bars justify-content-center">
                        <div class="cr-bar" data-bar-percent="25" data-bar-title="2016:17"></div>
                        <div class="cr-bar" data-bar-percent="45" data-bar-title="2017:18"></div>
                        <div class="cr-bar" data-bar-percent="37" data-bar-title="2018:19"></div>
                        <div class="cr-bar" data-bar-percent="69" data-bar-title="2019:20"></div>
                        <div class="cr-bar" data-bar-percent="88" data-bar-title="2020:21"></div>
                    </div>
                    <span class="cr-bars__name">Our progress</span>
                </div>
            </div>
            <div class="col-lg-4 order-2 order-lg-3">
                <div class="service-area__services">
                    <div class="row">

                        <!-- Single Service -->
                        @foreach ($service1[1] as $item)

                            <div class="col-lg-12 col-md-12 wow flipInX">
                                <div class="service">
                                    <div class="service__icon">
                                        <img src="{{ asset('korde/images/icons/service-icon-pie.png') }}"
                                            alt="service icon">
                                    </div>
                                    <div class="service__content">
                                        <h5>
                                            <a
                                                href="{{ route('dynamicService', $item->slug) }}">{{ $item->title }}</a><br><small>(₹
                                                {{ $item->price }})</small>


                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star checked"></span></small>
                                            <small><span class="fa fa-star"></span></small>

                                        </h5>
                                        <p>{!! $item->short_description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--// Single Service -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Service Area -->

@if (Request::segment(1) == null)

    <!-- Tax Calculation Area -->
    <section id="tax-calculation" class="tax-calculation-area bg--grey--light">
        <div class="taxcalc">
            <div class="row no-gutters align-items-center">

                <!-- Tax Calculation Area Left -->
                <div class="col-xl-5 col-lg-12">
                    <div class="taxcalc__content" data-black-overlay="4">
                        <div class="taxcalc__content__inner">
                            <h3>TAX
                                <span class="color--theme">CALCULATION</span>
                            </h3>
                            <p> Calculate your exact Tax Liability by putting Your Taxable Income for last 5 Years. </p>
                        </div>
                    </div>
                </div>
                <!--// Tax Calculation Area Left -->

                <!-- Tax Calculation Area Right -->
                <div class="col-xl-7 col-lg-12">
                    <div class="taxcalc__calculation">
                        <div class="taxcalc__calculation__inner">
                            <div class="row no-gutters">

                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3">
                                    <div class="single-input">
                                        <label for="taxcalc-employee-counter">Gross Income</label>
                                        {{-- <select name="taxcalc-employee-counter" id="taxcalc-employee-counter">

													<option value="1">Select Here</option>
													<option value="2">0 - 20</option>
													<option value="3">21 - 50</option>
													<option value="4">51 - 150</option>
													<option value="5">151 - 500</option>
													<option value="6">500+</option>
												</select> --}}

                                        <input type="tel" name="taxcalc-employee-counter" id="taxcalc_employee_counter"
                                            placeholder="Enter Gross Income">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.45">
                                    <div class="single-input">
                                        <label for="taxcalc-tax-year">Deductions</label>
                                        {{-- <select name="taxcalc-tax-year" id="taxcalc-tax-year">
													<option value="1">2000 - 2005</option>
													<option value="2">2006 - 2010</option>
													<option value="3">2011 - 2015</option>
													<option value="4">2016 - 2020</option>
												</select> --}}
                                        <input type="text" name="taxcalc-tax-year" id="taxcalc_tax_year"
                                            placeholder="deductions">
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.6">
                                    <div class="single-input">
                                        <label for="taxcalc-yearly-income">Taxable Total Income</label>
                                        {{-- <select name="taxcalc-yearly-income" id="taxcalc-yearly-income">
													<option value="1">Select Range</option>
													<option value="2">0 - 1 Million</option>
													<option value="3">1 Million - 3 Million</option>
													<option value="4">3 Million - 10 Million</option>
													<option value="5">10 Million - 20 Million</option>
													<option value="6">20 Million+</option>
												</select> --}}

                                        <input type="text" name="taxcalc-yearly-income" id="taxcalc-yearly-income"
                                            placeholder="No need to Enter value" readonly>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.15">
                                    <div class="single-input">
                                        <label for="taxcalc-business-area">Gender</label>
                                        <select name="taxcalc_business_area"
                                            id="taxcalc_business_area">
                                            <option>Select your gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="senior_citizen">Senior Citizen <small>(above 60
                                                    years)</small> </option>
                                            <option value="super_senior_citizen">Super Senior Citizen <small>(above 80
                                                    years)</small></option>
                                            {{-- <option value="5">Property Business</option> --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 wow fadeInUp">


                                    <div class="single-input">
                                        <label for="taxcalc-country-residence">Assessment Year</label>
                                        <select name="taxcalc_country_residence"
                                            id="taxcalc_country_residence">
                                            <option value="">Select Year</option>
                                            <option value="2021-2022-new">2021-2022 <small>(New Tax Slab)</small>
                                            </option>
                                            <option value="2021-2022-old">2021-2022 <small>(Old Tax Slab)</small>
                                            </option>
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2019-2020">2019-2020</option>
                                            <option value="2018-2019">2018-2019</option>
                                            <option value="2017-2018">2017-2018</option>


                                        </select>
                                    </div>
                                </div>




                                <div class="col-lg-8 col-md-8 wow fadeInUp" data-wow-delay="0.75">
                                    <div class="button-holder">
                                        {{-- <button class="cr-btn" type="submit">
                                            <span>Calculate</span>
                                        </button> --}}
                                        {{-- <span class="equal-sign">=</span> --}}
                                        <div class="single-input">
                                            <label for="taxcalc-total-calculation">Total Tax Laiblity</label>
                                            (₹)<input type="text" id="taxcalc_total_calculation" placeholder=" 000.00">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--// Tax Calculation Area Right -->

            </div>
        </div>
    </section>
    <!--// Tax Calculation Area -->
@endif

@if (Request::segment(1) == null)

    <!-- Team Area -->
    <section id="team-area" class="advisor-area bg--white section-padding--xlg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                    <div class="section-title text-center">
                        <h4>OUR TEAM</h4>
                        <h2>MEET OUR
                            <span class="color--theme">TAX ADVISOR</span>
                        </h2>
                        <p class="text-justify">Tax Advisors often prepare tax returns for clients, or they provide information and advice to help clients fill out their own tax returns. They answer client questions, help them prepare for future tax situations, and analyze information to ensure compliance with government regulations. These professionals may check others’ work to detect errors in tax preparation.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="team-wrap">

                        <!-- Single Team -->
                        @foreach ($ourteam as $item)
                            <div class="single-team">
                                @if ($item->featured_image)

                                    @php
                                        $image = json_decode($item->featured_image);
                                        
                                    @endphp

                                    <div class="image">
                                        <img src="{{ $image->thumbnail }}" alt="Advisor Thumb" width="550"
                                            height="278">
                                    </div>

                                @else

                                    <div class="image">
                                        <img src="{{ asset('korde/images/advisors/advisor-3/advisor-1.jpg') }}"
                                            alt="Advisor Thumb">
                                    </div>
                                @endif
                                <div class="content">
                                    <h6>{{ $item->name }}</h6>
                                    <h6>
                                        <small>{{ $item->sub_heading }}</small>
                                    </h6>
                                    <p>{!! $item->content !!}</p>
                                    <div class="social-icons">
                                        <ul>
                                            <li class="facebook">
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="#">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <!--// Single Team -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Team Area -->
@endif

<!-- Funfact Area -->
<div id="funfact-area" class="funfact-area bg--white">
    <div class="funfacts">
        <div class="row no-gutters">

            <!--  Single Funfact -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="funfact text-center">
                    <h1>
                        <span class="counter">5700</span>
                    </h1>
                    <h5>TRUSTED CLIENTS</h5>
                </div>
            </div>
            <!--//  Single Funfact -->

            <!--  Single Funfact -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="funfact text-center">
                    <h1>
                        <span class="counter">12</span>
                    </h1>
                    <h5>Awards Win</h5>
                </div>
            </div>
            <!--//  Single Funfact -->

            <!--  Single Funfact -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="funfact text-center">
                    <h1>
                        <span class="counter">2200</span>
                    </h1>
                    <h5>Project Done</h5>
                </div>
            </div>
            <!--//  Single Funfact -->

            <!--  Single Funfact -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="funfact text-center">
                    <h1>
                        <span class="counter">59</span>
                    </h1>
                    <h5>Expert Advisor</h5>
                </div>
            </div>
            <!--//  Single Funfact -->

        </div>
    </div>
</div>
<!--// Funfact Area -->

<!-- Testimonial Area -->
<div id="testimonial-area" class="testimonial-area section-padding-top--xlg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-title no-padding">
                    <h2>WHAT
                        <span class="color--theme">CLIENTS SAY</span>
                    </h2>
                    <p>Customer service means going above and beyond to keep the customer happy, whether that means answering any questions they have or resolving issues with a positive attitude. Customer satisfaction is the top priority, and hopefully creating loyal, returning customers.</p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="testimonial testimonial-slider-style3-active testimonial--style3">

                    @foreach ($testimonial as $item)
                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p class="text-left">{!! $item->content !!}</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    @if ($item->featured_image)
                                        @php
                                            $image = json_decode($item->featured_image);
                                            //dd($image);
                                        @endphp

                                        <img src="{{ $image->thumbnail }}" alt="testimonial author">

                                    @else
                                        <img src="{{ asset('korde/images/testimonial/testimonial-author-3.png') }}"
                                            alt="testimonial author">

                                    @endif
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>{{ $item->title }}</h6>
                                    <span>{{ $item->sub_heading }}</span>
                                </div>
                            </div>

                            <!--// Single Author -->

                        </div>
                    @endforeach
                    <!--// Testimonial Single -->



                </div>
            </div>
        </div>
    </div>
</div>
<!--// Testimonial Area -->

@if (Request::segment(1) == null)

    <!-- Blog Area -->
    <section id="blog-area" class="blog-area section-padding--xlg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                    <div class="section-title text-center">
                        <h4>OUR BLOG</h4>
                        <h2>LATEST POST
                            <span class="color--theme">FROM BLOG</span>
                        </h2>
                        <p>Necessary Information will be published through our Experts. they shall share their own views and information relating to Taxation, GST, Company Compliances, etc to the customers.</p>
                    </div>
                </div>
            </div>
            <div class="row blog-area__blogs justify-content-center">

                @foreach ($blog as $item)

                    <!-- Single Blog -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <article class="blog sticky">
                            <div class="blog__thumb">
                                @if ($item->article_image)
                                    @php
                                        $image = json_decode($item->article_image);
                                        //dd($image);
                                    @endphp
                                    <a href="{{ route('dynamicArticle', $item->slug) }}">
                                        <img src="{{ $image->thumbnail }}" alt="blog thumb" width="550" height="300">
                                    </a>

                                @else
                                    <a href="{{ route('dynamicArticle', $item->slug) }}">
                                        <img src="{{ asset('korde/images/blog/blog-thumbnail-1.jpg') }}"
                                            alt="blog thumb">
                                    </a>

                                @endif
                            </div>
                            <div class="blog__content">
                                <header class="blog__content__header">
                                    {{-- <ul class="blog__content__categories">
											<li>
												<a href="blog-right-sidebar.html">Tax</a>
											</li>
											<li>
												<a href="blog-right-sidebar.html">Personal Tax</a>
											</li>
										</ul> --}}
                                    <h4>
                                        <a
                                            href="{{ route('dynamicArticle', $item->slug) }}">{{ $item->title }}</a>
                                    </h4>
                                </header>
                                <footer class="blog__content__footer">
                                    <ul class="blog__content__meta">
                                        <li>{{ $item->created_at }}</li>
                                        <li>
                                            <a href="blog-right-sidebar.html">new</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">4 Comments</a>
                                        </li>
                                    </ul>
                                    <p>{{ $item->short_description }}</p>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <!--// Single Blog -->
                @endforeach

            </div>
        </div>
    </section>
    <!--// Blog Area -->
@endif

<!-- Call To Action Area -->
<section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
                <div class="calltoaction text-center">
                    <h3>NEED ANY HELP AT
                        <span class="color--theme"> YOUR TAX SOLUTION?</span>
                    </h3>
                    <p> Our experts are always ready to help you. You can make an appointment with the CA/Tax Advisor to resolve your Query. Experts shall be available in working business hours.
                    </p>
                    <h6>JUST DAIL
                        <a href="#">+91 9990070884</a> 
                    </h6>
                </div>
            </div>
        </div>
    </div>
</section>


<!--// Call To Action Area -->
