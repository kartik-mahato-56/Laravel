@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>New Page</title>
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
                <form action="{{route('new_page_post')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="login-form">
                    <h3 class="text-center">Add New Page</h3>
                    <div class="mb-3">
                      <label for="" class="form-label">Page Category</label>
                      <select class="form-control" name="page_slug" id="">
                        <option value="">select page category</option>
                        <option value="about-us">about-us</option>
                        <option value="living-room">living-room</option>
                        <option value="dining-room">dining-room</option>
                        <option value="bed-room">bed-room</option>
                        <option value="kitchen">kitchen</option>
                        <option value="showroom-interior">showroom</option>
                        <option value="hotel-restaurant">hotel-restaurant</option>
                        <option value="corporate-office">corporate-office</option>
                        <option value="customer-stories">customer-stories</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Page Title</label>
                      <input type="text"
                        class="form-control" name="page_name" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">
                        Description
                      </label>
                      <textarea class="form-control" name="description" id="" rows="5"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success">Add Page</button>
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
