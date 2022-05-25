@extends('site-layout')
@section('content')
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Add your site or application content here -->

	<div class="fakeloader"></div>

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">

		<!-- Header -->
		

		<!-- //Header -->

		<!-- Breadcrumb Area -->
		<div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 col-md-8">
						<div class="cr-breadcrumb">
							<ul class="cr-breadcrumb__pagination">
								<li>
									<a href="{{url('/')}}">Home</a>
								</li>
								<li>Services</li>
							</ul>
							<h1>Our Services</h1>
							<!-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem </p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// Breadcrumb Area -->

		<!-- Page Conent -->
		<main class="page-content">

			<!-- Page Service Area -->
			<section id="pg-services-area" class="cr-section pg-services-area section-padding--xlg">

				<!-- Pg Service Area Top -->
				<div class="pg-services-area__description">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 order-2 order-lg-1">
								<div class="pg-services__details">
									<h4>CAN’T SOLVE YOUR TAX PROBLEM?</h4>
									<h3>WE PROVIDE BEST
										<span class="color--theme">SERVICES FOR YOU</span>
									</h3>
									
									<p>Taxring IT Solutions Pvt Ltd is registered under the Ministry of Corporate Affairs Government of India.Taxring is the best most trusted website that offers online preparation and filing of individual Income Tax Returns, GST Return, Registrations, Accounting payroll, TDS Return, DSC, etc. Taxring is based out of New Delhi and Hyderabad, Uttar Pradesh, all over India</p>
								</div>
							</div>
							<div class="col-lg-5 order-1 order-lg-2">
								<div class="pg-services__thumb wow fadeInRight">
									<img src="../storage/default/services1.jpg" alt="services thumb">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--// Pg Service Area Top -->

				<!-- Services Styles Bottom -->
				<div class="pg-services-area__srevicelist servicelist--style2">
					<div class="container">
						<div class="row">

							<!-- Single Service -->
                            @foreach ($services as $item)
                                
							<div class="col-lg-4 col-md-6 wow fadeInUp">
								<div class="service service--style2">
									<div class="service__thumb">
                                        @php
										$images = json_decode($item->service_image, true);
										//dd($images);
										@endphp

										@if($item->service_image)
										<img src="{{$images["featured"]}}" alt="blog thumb" width="550"
											height="300">

										@else
										<img src="{{asset('storage/default/default.png')}}" alt="blog thumb" width="550"
											height="300">
										@endif
									</div>
									<div class="service__content">
										<h5>
											<a href="{{route('dynamicService', $item->slug)}}">{{$item->title}}</a>
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
				<!--// Services Styles Bottom -->

			</section>
			<!--// Page Service Area -->

			<!-- Funfact Area -->
			{{-- <div id="funfact-area" class="funfact-area bg--white">
				<div class="funfacts">
					<div class="row no-gutters">

						<!--  Single Funfact -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="funfact text-center">
								<h1>
									<span class="counter">349</span>
								</h1>
								<h5>TRUSTED CLIENTS</h5>
							</div>
						</div>
						<!--//  Single Funfact -->

						<!--  Single Funfact -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="funfact text-center">
								<h1>
									<span class="counter">109</span>
								</h1>
								<h5>Awards Win</h5>
							</div>
						</div>
						<!--//  Single Funfact -->

						<!--  Single Funfact -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="funfact text-center">
								<h1>
									<span class="counter">459</span>
								</h1>
								<h5>Project Done</h5>
							</div>
						</div>
						<!--//  Single Funfact -->

						<!--  Single Funfact -->
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="funfact text-center">
								<h1>
									<span class="counter">19</span>
								</h1>
								<h5>Expert Advisor</h5>
							</div>
						</div>
						<!--//  Single Funfact -->

					</div>
				</div>
			</div> --}}
			<!--// Funfact Area -->


			<!-- Call To Action Area -->
			<section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">

				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
							<div class="calltoaction text-center">
								<h3>NEED ANY HELP AT
									<span class="color--theme"> YOUR TAX SOLUTION?</span>
								</h3>
								<p>Our experts are always ready to help you. You can make an appointment with the CA/Tax Advisor to resolve your Query. Experts shall be available in working business hours. </p>
								<h6>JUST DAIL
									<a href="#">+91 9990070884</a></h6>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--// Call To Action Area -->

		</main>
		<!-- //Page Conent -->

		<!-- Footer Area -->
		
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	<script src="js/scripts.js"></script>
</body>
    
@endsection