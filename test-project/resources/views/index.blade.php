 @include('common.header')

    <body>

        <!-- Book Preloader -->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!--/ End Book Preloader -->
        <!-- Header -->
        @include('common.menu')
        <!-- End Header -->

        <!-- Slider Area -->
        <section class="home-slider">
            <div class="slider-active">
                <!-- Single Slider -->
                @foreach ($banners as $banner)
                    
                <div class="single-slider overlay" style="background-image:url('{{asset('banners/'.$banner->image)}}')" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-4 col-md-8 offset-md-4 col-12">
                                <div class="slider-text text-right">
                                    <h1>{{$banner->title}}</h1>
                                    <!--<div class="button">
                                        <a href="courses.html" class="btn primary">Read More</a>
                                    </div> -->  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Single Slider -->
                @endforeach
                <!-- Single Slider -->
            </div>
        </section>
        <!--/ End Slider Area -->
        <!-- Events -->
        <section class="events section pt0 widget-style-1 pb30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="event-slider">
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta">
                                <i class="fas fa-clipboard-list font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">First Visit</h4>
                            <p class="font-13">During the first visit, our personnel who will be your personal designer take accurate measurements.. <a href="#">more</a></p>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta">
                                <i class="fas fa-chalkboard-teacher font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">Understand</h4>
                            <p class="font-13">We are keen to understand and interpret your individual needs. Our expert designers will take.. <a href="#">more</a></p>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                    <!-- Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta">
                                <i class="fas fa-shipping-fast font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">Fast Paced</h4>
                            <p class="font-13">In this modern, fast paced world we realize the importance of your time. That's why we are.. <a href="#">more</a></p>
                        </div>
                    </div>
                    <!--/ End Single Event -->
                    <div class="single-event">
                        <div class="event-content">
                            <div class="meta">
                                <i class="fas fa-handshake font-30"></i>
                            </div>
                            <h4 class="mb0 font-22">Perfection</h4>
                            <p class="font-13">We can proudly say that no one can match our installation experts in terns of perfection and speed.. <a href="#">more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="our-features section widget-style-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <p class="text-uppercase font-24"><b class="color-orange">About Us</b></p>
                <p class="text-justify">We welcome you, to a wonderful world of Living Space. Where interior designing don't just dazzle with style, but exemplify clever utilization of available space and offer a world of convenience too. We offers a complete range of innovative solutions right from flooring, electrical, false ceiling, painting, custom furniture, plumbing and even art works etc. Our prodicts are designed keeping in mind of space ergonomics and intelligent space planning. We offer top quality interior designing work which has a combination of design, quality, and service at an affordable price.</p>
                <p class="mt20"><a href="{{route('about-us')}}" class="btn-1">Read More</a></p>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="widget-box">
                    <img src="{{asset('assets/images/small-banner1.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>




<section class="events section widget-style-4">
    <div class="widget-style-5">
        <div class="container">
            <div class="row">
                <div class="col-12 font-30 text-center mb20 color-white">Featured Products</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="event-slider">
                        <!-- Single Event -->
                        @foreach ($products as $product)
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('products/'.$product->image)}}" height="200px" width="200px" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">{{$product->title}}</a></div>
                            </div>
                        </div>
                        @endforeach
                        <!--/ End Single Event -->
                        <!-- Single Event -->
                        {{-- <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-2.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Living Room</a></div>
                            </div>
                        </div>
                        <!--/ End Single Event -->
                        <!-- Single Event -->
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-3.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Dining Room</a></div>
                            </div>
                        </div>
                        <!--/ End Single Event -->
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-4.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="{{route('bed-room')}}">Bed Room</a></div>
                            </div>
                        </div>
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-5.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Kitchen</a></div>
                            </div>
                        </div>
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-6.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Commercial Interior</a></div>
                            </div>
                        </div>
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-7.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Showroom Interior</a></div>
                            </div>
                        </div>
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-8.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Hotel & Restaurant Interior</a></div>
                            </div>
                        </div>
                        <div class="single-event">
                            <div class="event-content products">
                                <div class="products-img"><img src="{{asset('assets/images/products-9.jpg')}}" alt="" class="img-fluid"></div>
                                <div class="products-body"><a href="#">Corporate Office Interior</a></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




<section class="our-features section widget-style-6">
    <div class="container">
        <div class="row">
            <div class="col-12 font-30 text-center mb20 wow zoomIn">
                Why Us
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon1.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title">Creativity & In House Design</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon2.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">3D Modelling</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon3.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Wide Range</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon4.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Space Utilisation</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon5.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Experience and Efficiency</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon6.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Hassles Free</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon7.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Time line of delidery</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon8.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Budget and Reasonable pricing</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card text-center">
                    <img src="{{asset('assets/images/icon9.png')}}" class="img-fluid" alt="..." width="250">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">After Sales Service</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <section class="our-features section widget-style-9">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-8 pull-right">
                        <div class="card">
                            <!-- integrating the enquiry form -->
                            @include('common.enquiry')
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- Footer -->
    @include('common.footer')
<!--/ End Footer -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J695EKLB7F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J695EKLB7F');
</script>
        <!-- Jquery JS-->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-migrate.min.js')}}"></script>
        <!-- Popper JS-->
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap JS-->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Jquery Steller JS -->
        <script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
        <!-- Particle JS -->
        <script src="{{asset('assets/js/particles.min.js')}}"></script>
        <!-- Fancy Box JS-->
        <script src="{{asset('assets/js/facnybox.min.js')}}"></script>
        <!-- Magnific Popup JS-->
        <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Masonry JS-->
        <script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
        <!-- Circle Progress JS -->
        <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
        <!-- Owl Carousel JS-->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Waypoints JS-->
        <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
        <!-- Slick Nav JS-->
        <script src="{{asset('assets/js/slicknav.min.js')}}"></script>
        <!-- Counter Up JS -->
        <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
        <!-- Easing JS-->
        <script src="{{asset('assets/js/easing.min.js')}}"></script>
        <!-- Wow Min JS-->
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <!-- Scroll Up JS-->
        <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
        <!-- Google Maps JS -->
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyC0RqLa90WDfoJedoE3Z_Gy7a7o8PCL2jw"></script>
        <script src="{{asset('assets/js/gmaps.min.js')}}"></script>
        <!-- Main JS-->
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
