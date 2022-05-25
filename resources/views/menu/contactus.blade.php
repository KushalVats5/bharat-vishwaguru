@extends('site-layout')

@section('content')

    <body>
        <!--[if lte IE 9]>
                                      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
                                     <![endif]-->

        <!-- Add your site or application content here -->

        <div class="fakeloader"></div>
        </div>

        <!-- Mobile Menu -->
        <div class="container d-block d-lg-none">
            <div class="mobile-menu clearfix d-md-block d-lg-none">
                <a class="mobile-logo" href="{{ url('/') }}"><img src="images/logo/logo-theme.png" alt="logo"></a>
            </div>
        </div><!-- //Mobile Menu -->

        </div>
        <!--// Header Bottom Area -->

        </header><!-- //Header -->

        <!-- Breadcrumb Area -->
        <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="cr-breadcrumb">
                            <ul class="cr-breadcrumb__pagination">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Contact</li>
                            </ul>
                            <h1>Contact Us</h1>
                            {{-- <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
							totam rem </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->


        <!-- Page Conent -->
        <main class="page-content">

            <!-- Pg Contact -->
            <div class="pg-contact bg--white">

                <!-- Contact Form -->
                <div>
                    @include('errors.custom-message')

                </div>
                <div class="pg-contact-form-area bg--white section-padding--xlg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-12 " style="margin-top: 10%">
                                <div class="pg-appintment">
                                    <div class="pg-appintment__title">
                                        <h2>SEND A MESSAGE</h2>
                                    </div>
                                    <div class="pg-appintment__box">
                                        <form id="contact-form" action="{{ route('contactus_save') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" name="name" id="name" placeholder="Name">
                                                    </div>
                                                    @error('name')
                                                        <label id="name-error" class="text-danger"
                                                            for="name">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-input">
                                                        <select name="subject" id="">
                                                            <option value="consultation_with_ca/expert">Consultation with CA/Expert</option>
                                                            <option value="income_tax">Income Tax</option>
                                                            <option value="service_tax">Service Tax (GST)</option>
                                                            <option value="accountion">Accounting</option>
                                                            <option value="other">Other</option>
                                                            
                                                        </select>
                                                    </div>
                                                    @error('subject')
                                                        <label id="subject-error" class="text-danger"
                                                            for="subject">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-input">
                                                        <input type="email" name="email" id="email" placeholder="Email">
                                                    </div>
                                                    @error('email')
                                                        <label id="email-error" class="text-danger"
                                                            for="email">{{ $message }}</label>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" name="phone" id="phone" placeholder="Phone">
                                                    </div>
                                                    @error('phone')
                                                        <label id="phone-error" class="text-danger"
                                                            for="phone">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-input">
                                                        <textarea name="message" cols="30" rows="5"
                                                            placeholder="Message"></textarea>
                                                    </div>
                                                    @error('message')
                                                        <label id="message-error" class="text-danger"
                                                            for="message">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-input button text-left">
                                                        <button type="submit"
                                                            class="cr-btn"><span>Submit</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <p class="form-message"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12 d-none d-lg-block">
                                <div class="pg-contact-img ml-xl-5 ml-0">
                                    {{-- <img src="images/others/contact-image.jpg" alt="contact image"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--// Contact Form -->

                <div class="google-map-wrapper">
                    <div id="google-map" class="google-map"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9">
                                <div class="pg-contact__content">
                                    <h1>say hello to us</h1>
                                    <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem </p>
                                    <div class="pg-contact__blocks">
                                        <div class="single-block address">
                                            <h6>address</h6>
                                            <p> Plot No 145/54, Flat-4,Mishnaalik Complex,Krishnapuri Block,
                                                Mandawali Delhi-110092</p>
                                        </div>
                                        <div class="single-block phone">
                                            <h6>Phone</h6>
                                            {{-- <p><a href="#">011-41666343</a></p> --}}
                                            <p><a href="#">+91-9990070884</a></p>
                                            {{-- <p><a href="#">9990070884</a></p> --}}
                                        </div>
                                        <div class="single-block web">
                                            <h6>Web</h6>
                                            <p><a href="#"> support@taxring.com</a></p>
                                            {{-- <p><a href="#">www@taxco.com</a></p> --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="pg-contact__newsletter">
                                                <h5>also subscribe our newsletter to be uptodae</h5>
                                                <form action="{{ route('newsletter.store') }}" method="POST">
                                                    @csrf
                                                    <input name="user_email" id="exampleInputEmail" type="text"
                                                        placeholder="Enter your E-mail ">
                                                    <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--// Pg Contact -->

            <!-- Call To Action Area -->
            <section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
                            <div class="calltoaction text-center">
                                <h3>NEED ANY HELP AT
                                    <span class="color--theme"> YOUR TAX SOLUTION?</span>
                                </h3>
                                <p> Our experts are always ready to help you. You can make an appointment with the CA/Tax
                                    Advisor to resolve your Query. Experts shall be available in working business hours.
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

        </main><!-- //Page Conent -->

        </div><!-- //Main wrapper -->


        <!-- Google Map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxvP66_Xk1ts77oL2Z7EpDxhDD_jMg-D0"></script>
        <script>
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 12,

                    scrollwheel: false,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(40.740610, -73.935242), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on

                    styles: [{
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#e9e9e9"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [{
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [{
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#f5f5f5"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#dedede"
                                },
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [{
                                    "visibility": "on"
                                },
                                {
                                    "color": "#ffffff"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                    "saturation": 36
                                },
                                {
                                    "color": "#333333"
                                },
                                {
                                    "lightness": 40
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [{
                                    "color": "#f2f2f2"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [{
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [{
                                    "color": "#fefefe"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        }
                    ]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('google-map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.740610, -73.805242),
                    map: map,
                    title: 'Korde',
                    icon: "images/icons/marker.png",
                    animation: google.maps.Animation.BOUNCE
                });
            }
        </script>


        <!-- JS Files -->
        <script src="js/vendor/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/active.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/ajax-mail.js"></script>
    </body>

@endsection
