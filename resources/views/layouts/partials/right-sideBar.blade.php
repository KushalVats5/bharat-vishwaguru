<div class="col-lg-4">
    <div class="widgets sidebar-widgets">
        {{-- <!-- Single Widget -->
        <section class="single-widget widget-about">
            <header class="widget-about__thumb">
                <img src="images/others/about-widget.jpg" alt="about widget thumb">
            </header>
            <footer class="widget-about__content">
                <p>On the other hand, dislike men who are so beguiled and demoralized by the
                    charms of pleasure of the</p>
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
        </section>
        <!--// Single Widget --> --}}
        <!-- Single Widget -->
        <section class="single-widget widget-search">
            <h6>Search</h6>
            <form action="{{ route('blog') }}" method="GET">
                {{-- @csrf --}}
                <input type="text" name="search" placeholder="Search Keyword">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </section>
        <!--// Single Widget -->
        <!-- Single Widget -->
        <section class="single-widget widget-recentpost">
            <h6>Recent Post</h6>
            <ul>
                @foreach ($desending as $blog)
                    <li>
                        @php
                            $images = json_decode($blog->article_image, true);
                            //dd($images);
                        @endphp
                        @if ($blog->article_image)
                            <a class="widget-recentpost__thumb" href="{{ route('dynamicArticle', $blog->slug) }}"><img
                                    src="{{ $images['featured'] }}" alt="blog thumbnail"></a>
                        @else
                            <a class="widget-recentpost__thumb" href="{{ route('dynamicArticle', $blog->slug) }}"><img
                                    src="{{ asset('storage/default/default.png') }}" alt="blog thumbnail" width="300px"
                                    height="100px"></a>
                        @endif
                        <div class="widget-recentpost__content">
                            <span class="date">{{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                            <h6><a href="{{ route('dynamicArticle', $blog->slug) }}">{{ $blog->title }}</a>
                            </h6>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
        <!--// Single Widget -->
        <!-- Single Widget -->
        <!-- <section class="single-widget widget-categories">
            <h6>Categories</h6>
            @foreach ($categories as $category)
                <ul>
                    <li><a href="{{ route('dynamicCategory', $category->slug) }}">{{ $category->title }}
                            @php
                                $count = App\Article_Category::where('category_id', $category->id)->count();
                            @endphp
                            <span>{{ $count }}</span></a></li>
                </ul>
            @endforeach
        </section> -->
        <!--// Single Widget -->
        <!-- Single Widget -->
        <section class="single-widget widget">
            <h6>Services</h6>
            <ul>
                @foreach ($services as $service)
                <li>
                    <h6><a href="{{route('dynamicService', $service->slug)}}">{{$service->title}}</a> <small>(INR {{$service->price}})</small></h6>
                    {{-- <ul>
                        <li>INR {{$service->price}}</li>
                        <li>04.00am</li>
                        <li><a href="{{route('dynamicService', $service->slug)}}">Check Now</a></li>
                    </ul> --}}
                </li>
                @endforeach
            </ul>
            {{-- <ul>
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
                    <h6><a href="#">TRAINING ON TAX CALCULATION TO LEARN TO CALCULATE TAX.</a>
                    </h6>
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
            </ul> --}}
        </section>
        <!--// Single Widget -->
        <!-- Single Widget -->
        <!-- <div class="single-widget widget-banner">
            <a href="#"><img src="{{ asset('korde/images/others/sidebar-banner.png') }}" alt="sidebar banner"></a>
        </div> -->
        <!--// Single Widget -->
        <!-- Single Widget -->
        <!-- <section class="single-widget widget-newsletter">
            <h6>Newsletter</h6>
            <form action="{{ route('newsletter.store') }}" method="POST">
                @csrf
                <input name="user_email" id="exampleInputEmail" type="text" placeholder="Enter your E-mail ">
                <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
            </form>
        </section> -->
        <!--// Single Widget -->
       {{--  <!-- Single Widget -->
        <section class="single-widget widget-instagram">
            <h6>Instagram</h6>
            <ul id="sidebar-instagram-feed"></ul>
        </section>
        <!--// Single Widget -->
        <!-- Single Widget -->
        <section class="single-widget widget-twitter-feed">
            <h6>Recent Tweets</h6>
            <ul>
                <li>
                    <a class="tweet-author" href="#">@momenbhuiyan</a>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam.</p>
                    <a class="tweet-time" href="#"><span>13 Feb
                            2016</span><span>04.00am</span></a>
                </li>
                <li>
                    <a class="tweet-author" href="#">@robiulsiddikee</a>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam.</p>
                    <a class="tweet-time" href="#"><span>13 Feb
                            2016</span><span>04.00am</span></a>
                </li>
                <li>
                    <a class="tweet-author" href="#">@arifsinha</a>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam.</p>
                    <a class="tweet-time" href="#"><span>13 Feb
                            2016</span><span>04.00am</span></a>
                </li>
            </ul>
        </section>
        <!--// Single Widget -->
        <!-- Single Widget -->
        <section class="single-widget widget-social-icon">
            <h6>Social Icons</h6>
            <ul>
                <li class="facebook"><a href="https://www.facebook.com/taxring.taxring/"><i
                            class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a href="https://twitter.com/taxring"><i class="fa fa-twitter"></i></a></li>
                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li class="vimeo"><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul>
        </section>
        <!--// Single Widget -->
        <!-- Single Widget -->
        <div class="single-widget widget-calender">
            <div id="my-calendar"></div>
        </div>
        <!--// Single Widget -->
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
        </section>
        <!--// Single Widget --> --}}
    </div>
</div>
