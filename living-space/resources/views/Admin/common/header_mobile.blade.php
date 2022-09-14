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
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('banner')}}">
                        <i class="fa fa-list-alt"></i>Banners
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('enquiries')}}">
                        <i class="fa fa-envelope" aria-hidden="true"></i>Enquiries
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-window-restore" aria-hidden="true"></i>Products</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{route('new_featured_products')}}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{route('featured_products')}}">List Products</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tasks"></i>Menu Bar</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="">Add Main Menu</a>
                        </li>
                        <li>
                            <a href="">List Main Menu</a>
                        </li>
                        <li>
                            <a href="">Add Sub Menu</a>
                        </li>
                        <li>
                            <a href="">List Sub Menu</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-copy" aria-hidden="true"></i>Pages</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="">Add Pages</a>
                        </li>
                        <li>
                            <a href="">List Pages</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>