<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                @include('Admin.common.header_desktop')
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                   
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('banner')}}">
                        <i class="fa fa-list-alt"></i>Banners
                    </a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('banner')}}">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>Enquiries
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>
</header>