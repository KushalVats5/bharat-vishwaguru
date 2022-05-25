@extends('site-layout')




	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Add your site or application content here -->

	<div class="fakeloader"></div>

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		@section('banner')
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
								<li>About</li>
							</ul>
							<h1>{{$content->title}}</h1>
							{{-- <p>{{$content->sub_heading}}</p> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// Breadcrumb Area -->
@endsection
@section('content')
	

			<!-- About Area -->
			<section id="about-area" class="cr-section about-area bg--white">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-10 offset-lg-1">
							<div class="about-area__content2 text-center">
								{{-- <h4>WE ARE “
									<span class="color--theme">Taxring</span>”</h4>
								<h3 class="cd-headline cx-heading slide">PROVIDE BEST TAX SOLUTION FOR YOUR
									<span class="color--theme cd-words-wrapper cd-words-wrapper-2">
										<b class="is-visible">Business</b>
										<b>Performance</b>
										<b>Success</b>
									</span>
									TO GROWUP</h3> --}}
								<div class="p-5">
									<span style="text-align: justify;">{!!$content->content!!}</span>

								</div>

                                {{-- <a href="#"><button class="btn btn-success btn-sm">Register as freelancer <small>(working on freelancer functionality. :)</small> </button></a>
								</a> --}}
							</div>
						</div>
						<div class="col-lg-12">
							<div class="about-area__image2">
								{{-- <img src="{{asset('korde/images/about/about-thumbnail-3.png')}}" alt="about area image"> --}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- //About Area -->

			{{-- @include('layouts.footer') --}}


		

	</div>
	<!-- //Main wrapper -->

@endsection
