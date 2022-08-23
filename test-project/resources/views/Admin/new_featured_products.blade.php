@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>New Products</title>
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
            <div class="section__content section__content--p30">
              <div class="login-content">
                <form action="{{route('new_featured_products_post')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="login-form">
                    <h4 class="text-center">Add New Featured Products</h4>
                    <div class="mb-3">
                      <label for="" class="form-label">Title</label>
                      <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                   
                    <div class="mb-3">
                      <label for="" class="form-label">Banner image</label>
                      <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="status" value="1" id="">
                      <label class="form-check-label" for="">
                        Active
                      </label>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-success" type="submit">Add Featured Products</button>
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