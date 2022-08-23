@include('Admin.common.head')
<title>Change Password</title>
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
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
          <form action="{{route('change_password_post')}}" method="post" class="change_password">
            @csrf
            <input type="hidden" name="id" value="{{session('ADMIN_ID')}}">
            <div class="mb-3">
              <label for="" class="form-label">Old password</label>
              <input type="password" class="form-control" name="old_password" id="" aria-describedby="helpId" placeholder="">
              <span class="text-danger">
                @if(session('old_pass_required'))
                {{session('old_pass_required')}}
                @endif
                @if(session('wrong_pass'))
                {{session('wrong_pass')}}
                @endif
              </span>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">New password</label>
              <input type="password" class="form-control" name="new_password" id="" aria-describedby="helpId" placeholder="">
              <span class="text-danger">
                @error('new_password')
                {{$message}}
                @enderror
                @if(session('pass_matched'))
                {{session('pass_matched')}}
                @endif
              </span>
            </div>
            {{-- <div class="mb-3">
              <label for="" class="form-label">Confirm new password</label>
              <input type="password" class="form-control" name="confirm_password" id="" aria-describedby="helpId" placeholder="">
              <span class="text-danger">
                @error('confirm_password')
                {{"password shoud be matched"}}
                @enderror
                
              </span>
              
            </div> --}}
            <div class="text-center">
                <button type="submit" class="btn btn-success">Change Password</button>
            </div>
        </form>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>

    @include('Admin.common.footer')

</body>
</html>