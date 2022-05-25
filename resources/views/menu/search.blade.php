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
		<header id="header" class="header sticky--header">


		</header><!-- //Header -->
		<!-- Breadcrumb Area -->
		<div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 col-md-8">
						<div class="cr-breadcrumb">
							<ul class="cr-breadcrumb__pagination">
								<li><a href="{{url('/')}}">Home</a></li>
								<li>Blog</li>
							</ul>
							<h1>Our Blogs</h1>
							{{-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem  </p> --}}
						</div>
					</div>
				</div>
			</div>
		</div><!--// Breadcrumb Area -->

		<!-- Page Conent -->
		<main class="page-content">

			<!-- BLogs grid -->
			<div class="cr-section pg-blogs-area section-padding--xlg bg--white">
				<div class="container">
					<div class="row">

						<!-- Blogs -->
						<div class="col-lg-8">
							<div class="row pg-blog-area__blogs bloglist">
								@foreach ($blogs as $blog)
									<!-- Single Blog -->
									<div class="col-12">
										<article class="blog sticky">
											<div class="blog__thumb mt-4">
												<a href="blog-details.html">
													@php
														$images = json_decode($blog->article_image, true);
														//dd($images);
													@endphp

													@if($blog->article_image)
													<img src="{{$images["featured"]}}" alt="blog thumb" width="770" height="432">

													@else
													<img src="../storage/default/default.png" alt="blog thumb" width="770" height="432">
													@endif
												</a>
											</div>
											
											<div class="blog__content">
												<h2><a href="{{route('dynamicArticle', $blog->slug)}}">{{$blog->title}}</a></h2>
												<ul class="blog__content__meta">
													<li>{{date('M d, Y', strtotime($blog->created_at))}}</li>
												
													<li><a href="blog-right-sidebar.html">{{Helper::getUserValue($blog->user_id)}}</a></li>
													<li><a href="blog-right-sidebar.html">4 Comments</a></li>
												</ul>
												<p>Serspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudanti, am rem aperiam, eaque ipsa quae so some ulation porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi  </p>
												<a href="{{route('dynamicArticle', $blog->slug)}}" class="cr-readmore-2"><span>Read more</span></a>
											</div>
											
										</article>
									</div><!--// Single Blog -->

									
								@endforeach

								{{$blogs->links()}}
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="cr-pagination">
										<ul>
											<li class="active"><a href="blog-with-right-sidebar.html">1</a></li>
											<li><a href="blog-with-right-sidebar.html">2</a></li>
											<li><a href="blog-with-right-sidebar.html">3</a></li>
											<li><a href="blog-with-right-sidebar.html">4</a></li>
											<li><a href="blog-with-right-sidebar.html">5</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!--// Blogs -->

						<!-- Sidebar -->
						<div class="col-lg-4">
							<div class="widgets sidebar-widgets">
								<!-- Single Widget -->
								<section class="single-widget widget-about">
									<header class="widget-about__thumb">
										<img src="images/others/about-widget.jpg" alt="about widget thumb">
									</header>
									<footer class="widget-about__content">
										<p>On the other hand, dislike men who are so beguiled and demoralized by the charms of pleasure of the</p>
										<h6>Robart Rofiq Bali</h6>
										<h6><small>UI UX Designer</small></h6>
										<div class="social-icons">
											<ul>
												<li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
												<li class="twitter"><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
												<li class="vimeo"><a href="https://www.vimeo.com/"><i class="fa fa-vimeo"></i></a></li>
												<li class="pinterest"><a href="https://pinterest.com"><i class="fa fa-pinterest"></i></a></li>
											</ul>
										</div>
									</footer>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-search">
									<h6>Search</h6>
									<form action="{{route('search')}}" method="GET">
										@csrf
										<input type="text" name = "query" placeholder="Search Keyword">
										<button type="submit"><i class="fa fa-search"></i></button>
									</form>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-recentpost">
									<h6>Recent Post</h6>
									<ul>
										<li>
											<a  class="widget-recentpost__thumb" href="blog-details.html"><img src="images/blog/thumbnail/blog-thumbnail-1.png" alt="blog thumbnail"></a>
											<div class="widget-recentpost__content">
												<span class="date">october  18,  2018</span>
												<h6><a href="blog-details.html">Various tax guide line for every one</a></h6>
											</div>
										</li>
										<li>
											<a  class="widget-recentpost__thumb" href="blog-details.html"><img src="images/blog/thumbnail/blog-thumbnail-2.png" alt="blog thumbnail"></a>
											<div class="widget-recentpost__content">
												<span class="date">october  16,  2018</span>
												<h6><a href="blog-details.html">financial development for startup business</a></h6>
											</div>
										</li>
										<li>
											<a  class="widget-recentpost__thumb" href="blog-details.html"><img src="images/blog/thumbnail/blog-thumbnail-3.png" alt="blog thumbnail"></a>
											<div class="widget-recentpost__content">
												<span class="date">october  14,  2018</span>
												<h6><a href="blog-details.html">irs tax payer protection system</a></h6>
											</div>
										</li>
										<li>
											<a  class="widget-recentpost__thumb" href="blog-details.html"><img src="images/blog/thumbnail/blog-thumbnail-4.png" alt="blog thumbnail"></a>
											<div class="widget-recentpost__content">
												<span class="date">october  12,  2018</span>
												<h6><a href="blog-details.html">in house training for corporate tax</a></h6>
											</div>
										</li>
									</ul>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-categories">
									<h6>Categories</h6>
									@foreach ($categories as $category)
									
									<ul>
										<li><a href="{{route("dynamicCategory", $category->slug)}}">{{$category->title}} <span>{{$category->articles->count()}}</span></a></li>
										
									</ul>
									@endforeach
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-recentcomment">
									<h6>Recent Comments</h6>
									<ul>
										<li>
											<h6><a href="#">HOW TO MINIMIZE TAX FOR OUR BUSINESS.</a></h6>
											<ul>
												<li>13 Feb 2016</li>
												<li>04.00am</li>
												<li><a href="blog-with-right-sidebar.html">Arif Vai</a></li>
											</ul>
										</li>
										<li>
											<h6><a href="#">FINANCIAL ADVICE TO DEVELOP BUSINESS SIMPLE WAY.</a></h6>
											<ul>
												<li>13 Feb 2016</li>
												<li>04.00am</li>
												<li><a href="blog-with-right-sidebar.html">Arif Vai</a></li>
											</ul>
										</li>
										<li>
											<h6><a href="#">IRS TAX PAYER PROTECTION SYSTEM.</a></h6>
											<ul>
												<li>13 Feb 2016</li>
												<li>04.00am</li>
												<li><a href="blog-with-right-sidebar.html">Arif Vai</a></li>
											</ul>
										</li>
										<li>
											<h6><a href="#">TRAINING ON TAX CALCULATION TO LEARN TO CALCULATE TAX.</a></h6>
											<ul>
												<li>13 Feb 2016</li>
												<li>04.00am</li>
												<li><a href="blog-with-right-sidebar.html">Arif Vai</a></li>
											</ul>
										</li>
										<li>
											<h6><a href="#">IT’S NOT SIMPLE TO LEARN ABOUT TAX AND FINANCE.</a></h6>
											<ul>
												<li>13 Feb 2016</li>
												<li>04.00am</li>
												<li><a href="blog-with-right-sidebar.html">Arif Vai</a></li>
											</ul>
										</li>
									</ul>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<div class="single-widget widget-banner">
									<a href="#"><img src="images/others/sidebar-banner.png" alt="sidebar banner"></a>
								</div><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-newsletter">
									<h6>Newsletter</h6>
									<form action="#">
										<input type="text" placeholder="Enter your E-mail ">
										<button type="submit"><i class="fa fa-paper-plane-o"></i></button>
									</form>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-instagram">
									<h6>Instagram</h6>
									<ul id="sidebar-instagram-feed"></ul>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-twitter-feed">
									<h6>Recent Tweets</h6>
									<ul>
										<li>
											<a class="tweet-author" href="#">@momenbhuiyan</a>
											<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
											<a class="tweet-time" href="#"><span>13 Feb 2016</span><span>04.00am</span></a>
										</li>
										<li>
											<a class="tweet-author" href="#">@robiulsiddikee</a>
											<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
											<a class="tweet-time" href="#"><span>13 Feb 2016</span><span>04.00am</span></a>
										</li>
										<li>
											<a class="tweet-author" href="#">@arifsinha</a>
											<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
											<a class="tweet-time" href="#"><span>13 Feb 2016</span><span>04.00am</span></a>
										</li>
									</ul>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-social-icon">
									<h6>Social Icons</h6>
									<ul>
										<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
										<li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
									</ul>
								</section><!--// Single Widget -->

								<!-- Single Widget -->
								<div class="single-widget widget-calender">
									<div id="my-calendar"></div>
								</div><!--// Single Widget -->

								<!-- Single Widget -->
								<section class="single-widget widget-tags">
									<h6>Tags</h6>
									<ul>
										<li><a href="blog-with-right-sidebar.html">Design</a></li>
										<li><a href="blog-with-right-sidebar.html">Print</a></li>
										<li><a href="blog-with-right-sidebar.html">Adobe</a></li>
										<li><a href="blog-with-right-sidebar.html">Development</a></li>
										<li><a href="blog-with-right-sidebar.html">Support</a></li>
										<li><a href="blog-with-right-sidebar.html">Creative</a></li>
									</ul>
								</section><!--// Single Widget -->
							</div>
						</div><!--// Sidebar -->

					</div>
				</div>
			</div><!--// BLogs grid -->

			<!-- Call To Action Area -->
			<section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">
				 
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
							<div class="calltoaction text-center">
								<h3>NEED ANY HELP AT<span class="color--theme"> YOUR TAX SOLUTION?</span></h3>
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci </p>
								<h6>JUST DAIL <a href="callto://+00812548359874">+008 12548 359 874</a> (TOLL FREE)</h6>
							</div>
						</div>
					</div>
				</div>
			</section><!--// Call To Action Area -->
			
		</main><!-- //Page Conent -->


	</div><!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	<script src="js/scripts.js"></script>
</body>

@endsection


