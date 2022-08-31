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
                        <i class="fa fa-picture-o" aria-hidden="true"></i>Banners</a>
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
                        <i class="fas fa-tasks"></i>Menu Bar</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('add_menu')}}">Add Main Menu</a>
                        </li>
                        <li>
                            <a href="{{route('show_main_menu')}}">List Main Menu</a>
                        </li>
                        <li>
                            <a href="{{route('add_sub_menu')}}">Add Sub Menu</a>
                        </li>
                        <li>
                            <a href="{{route('list_sub_menu')}}">List Sub Menu</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-copy" aria-hidden="true"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('add_page')}}">Add Page</a>
                        </li>
                        <li>
                            <a href="{">List Page</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>Images</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('new_image')}}">Add Image</a>
                        </li>
                        <li>
                            <a href="">List Images</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </nav>
    </div>
</aside>