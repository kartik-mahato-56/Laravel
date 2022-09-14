@include('common.header')
<body>

        <!-- Book Preloader -->
        {{-- <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div> --}}
        <!--/ End Book Preloader -->
        <!-- Header -->
        @include('common.menu')
        <!-- End Menu -->
        <section class="our-features section widget-style-9">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-1 widget-style-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact Us</h5>
                                <p class="font-18"><img src="images/whatsapp-icon.svg" width="24" alt=""> <a href="https://api.whatsapp.com/send?phone=9832044990" class="color-black">+91 98320 44990</a> <i class="fas fa-phone-alt ml20"></i> <a href="tel:9832044990" class="color-black">+91 98320 44990</a></p>
                                <p class="font-18 mb0"><b>Address</b></p>
                                <p class="font-16 mb0 color-black"><b>Kolkata:</b></p>
                                <p class="font-16">225, Block A, Laketown Near Swimming Pool, Kolkata - 700089</p>
                                <p class="font-16 mb0 color-black"><b>Siliguri:</b></p>
                                <p class="font-16">96, Nazrul Sarani, Ashrampara, Siliguri - 734001</p>
                                <p class="font-18 mb0"><b>Email</b></p>
                                <p><i class="far fa-paper-plane"></i> <a href="mailto:livingspacekolkata@gmail.com" class="color-black">livingspacekolkata@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
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
