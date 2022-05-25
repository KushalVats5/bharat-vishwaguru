@extends('site-layout')

@section('content')

    {{-- <body> --}}
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
     <![endif]-->

    <!-- Add your site or application content here -->

    <div class="fakeloader"></div>

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Header -->


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
                            {{-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

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
                                                <a href="{{ route('dynamicArticle', $blog->slug) }}">
                                                    @php
                                                        $images = json_decode($blog->article_image, true);
                                                        //dd($images);
                                                    @endphp

                                                    @if ($blog->article_image)
                                                        <img src="{{ $images['featured'] }}" alt="blog thumb" width="770"
                                                            height="432">

                                                    @else
                                                        <img src="{{ asset('storage/default/default.png') }}"
                                                            alt="blog thumb" width="770" height="432">
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="blog__content">
                                                <h2><a
                                                        href="{{ route('dynamicArticle', $blog->slug) }}">{{ $blog->title }}</a>
                                                </h2>
                                                <ul class="blog__content__meta">
                                                    <li>{{ date('M d, Y', strtotime($blog->created_at)) }}</li>

                                                    {{-- <li><a
                                                            href="javascript:;">{{ Helper::getUserValue($blog->user_id) }}</a>
                                                    </li> --}}
                                                    {{-- <li><a href="blog-right-sidebar.html">4 Comments</a></li> --}}
                                                </ul>
                                                <p>{!! $blog->content !!} </p>
                                                <a href="{{ route('dynamicArticle', $blog->slug) }}"
                                                    class="cr-readmore-2"><span>Read more</span></a>
                                            </div>

                                        </article>
                                    </div>
                                    <!--// Single Blog -->


                                @endforeach

                                {{ $blogs->links() }}
                            </div>

                            {{-- <div class="row">
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
							</div> --}}
                        </div>
                        <!--// Blogs -->

                        <!-- Sidebar -->
                        @include('layouts.partials.right-sideBar')
                        <!--// Sidebar -->

                    </div>
                </div>
            </div>
            <!--// BLogs grid -->

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

        </main><!-- //Page Conent -->


    </div><!-- //Main wrapper -->

    <!-- JS Files -->
    {{-- <script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	<script src="js/scripts.js"></script>
</body> --}}

@endsection
