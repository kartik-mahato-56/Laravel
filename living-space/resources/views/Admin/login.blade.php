@include('Admin.common.head')
<title>Login</title>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
               
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="logo text-center">
                            <img src="{{asset('assets/images/logo.png')}}" alt="#">
                        </div>
                        <div class="login-form">
                            @if (session('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                                        
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                                        
                        @endif
                            <form action="{{route('login')}}" enctype="multipart/form-data" method="post">
                                @csrf
                           
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="{{route('forget-pass')}}">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                {{-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> --}}
                                <div class="register-link">
                                    <p>
                                        Don't you have account?
                                        <a href="{{route('register')}}">Sign Up Here</a>
                                    </p>
                                </div>
                            </form>
                        </div>
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