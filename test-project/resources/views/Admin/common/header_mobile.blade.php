<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{route('dashboard')}}">
                    <img src="{{asset('assets/images/logo.png')}}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('banner')}}">
                        <i class="fa fa-list-alt"></i>Banners
                    </a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('enquiries')}}">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>Enquiries
                    </a>
                </li>
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('featured_products')}}">
                        <i class="fa fa-window-maximize"></i>Featured Products
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>