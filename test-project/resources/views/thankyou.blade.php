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
        <!-- End Menu -->
        <section class="our-features section widget-style-9">
            <div class="container">
                <div class="jumbotron text-center">
                    <div class="main-content">
                        {{-- <i class="fa fa-check main-content__checkmark" id="checkmark"></i> --}}
                    </div>
                    {{-- <img src="{{asset('assets/images/thankyou.jpg')}}" alt=""> --}}
                    <h1 class="display-3">Thank You!</h1>
                    <p class="lead"><strong>Thank You for contacting with us. An confirmation email has been sent to your mail id, please check it.</strong></p>
                    <hr>

                    <p class="lead">
                      <a class="btn btn-primary" href="{{route('index')}}" role="button">Continue to homepage</a>
                    </p>
                  </div>
            </div>
        </section>

<!-- Footer -->
@include('common.footer')
<!--/ End Footer -->

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
