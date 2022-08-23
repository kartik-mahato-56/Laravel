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
                
                <footer class="text-center">
                 <i class="fa fa-copyright" aria-hidden="true"></i>Copyright@2022 all rights reserved
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
