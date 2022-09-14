<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                   <!--class="noti-wrap" -->
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">

                        </div>
                    </div>
                   <!-- end noti-wrap-->
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if (admindata(session('ADMIN_ID'))->profile_pic)
                                <img src="{{asset('users/' .admindata(session('ADMIN_ID'))->profile_pic)}}">
                                @else
                                <img src="{{asset('image/user.png')}}" >
                                
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{admindata(session('ADMIN_ID'))->username}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        @if (admindata(session('ADMIN_ID'))->profile_pic)
                                        <img src="{{asset('users/' .admindata(session('ADMIN_ID'))->profile_pic)}}">
                                        @else
                                        <img src="{{asset('image/user.png')}}" >
                                        
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{admindata(session('ADMIN_ID'))->username}}</a>
                                        </h5>
                                        <span class="email">{{admindata(session('ADMIN_ID'))->email}}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{route('account')}}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{route('change_password_get')}}">
                                            <i class="fa fa-key"></i>Password</a>
                                    </div>
                                   
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{route('logout')}}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
