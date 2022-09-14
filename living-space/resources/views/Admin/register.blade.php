@include('Admin.common.head')
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="logo text-center">
                            <a href=""><img src="{{asset('assets/images/logo.png')}}" alt="#"></a>
                        </div>
                        <form action="{{route('signed_up')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                    <span class="text-danger">
                                        @error('username')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="Email">
                                    <span class="text-danger">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    <span class="text-danger">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        {{-- <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button> --}}
                                        {{-- <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button> --}}
                                        <div class="register-link">
                                            <p>
                                                Already have account?
                                                <a href="{{route('admin')}}">Sign In</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    @include('Admin.common.footer')

</body>

</html>
<!-- end document-->