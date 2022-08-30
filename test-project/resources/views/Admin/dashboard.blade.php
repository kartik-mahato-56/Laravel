<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
@include('Admin.common.head')
<title>Dashboard</title>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('Admin.common.header_mobile')
        <!-- END HEADER MOBILE-->
        @include('Admin.common.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('Admin.common.header_desktop')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content page-content--bgf7">
                    {{-- <div class="container-fluid"> --}}
                        <section class="statistic statistic2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item statistic__item--green">
                                            <h2 class="number">{{$banner}}</h2>
                                            <span class="desc">Banners</span>
                                            <div class="icon">
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item statistic__item--orange">
                                            <h2 class="number">{{$enquiry}}</h2>
                                            <span class="desc">Enquiries</span>
                                            <div class="icon">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item statistic__item--blue">
                                            <h2 class="number">{{$product}}</h2>
                                            <span class="desc">Featured Products</span>
                                            <div class="icon">
                                                <i class="fa fa-window-maximize"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item statistic__item--red">
                                            <h2 class="number">404</h2>
                                            <span class="desc">Pages</span>
                                            <div class="icon">
                                                <i class="fa fa-window-restore" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
               
                    {{-- </div> --}}
                </div>
                            
                <footer class="text-center">
                 <i class="fa fa-copyright" aria-hidden="true"></i>Copyright@2022 all rights reserved, 
                </footer>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   @include('Admin.common.footer')

</body>

</html>
<!-- end document-->
