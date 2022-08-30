@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>New Menu</title>
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
            <div class="section__content">
              <div class="login-content">
                <form action="{{route('new_menu_submit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="login-form">
                    @if(session('status'))
                        <span class="text-success">{{session('status')}}</span>
                    @endif

                    <h3 class="text-center">Add New Menu</h3>
                    <div class="mb-3">
                      <label for="" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">slug</label>
                      <input type="text"
                        class="form-control" name="slug" id="" aria-describedby="helpId" placeholder="">
                        @error('slug')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Sub Menu Option</label>
                      <select class="form-control" name="sub_menu" id="">
                        <option value="0" selected>No</option>
                        <option value="1">Yes</option>
                      
                      </select>
                    </div>
                 
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success">Add Menu</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          {{-- <footer class="text-center">
           <i class="fa fa-copyright" aria-hidden="true"></i>Copyright@2022 all rights reserved
          </footer> --}}
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>
  @include('Admin.common.footer')
</body>
