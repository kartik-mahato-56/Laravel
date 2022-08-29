<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo.png')}}" alt="#"></a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-list-alt" aria-hidden="true"></i></i>Banners</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('new_banner')}}">Add Banner</a>
                        </li>
                        <li>
                            <a href="{{route('banner')}}">List Banners</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('enquiries')}}">
                        <i class="fa fa-envelope" aria-hidden="true"></i>Enquiries
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-window-restore" aria-hidden="true"></i>Products</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                        <i class="fas fa-copy"></i>Menu Bar</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="">Add Main Menu</a>
                        </li>
                        <li>
                            <a href="">Add Sub Menu</a>
                        </li>
                        <li>
                            <a href="">List Main Menu</a>
                        </li>
                        <li>
                            <a href="">List Sub Menu</a>
                        </li>
                        <li>
                            <a href="">List Images</a>
                        
                        </li>
                        <li>
                            <a href="">Add Images</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>