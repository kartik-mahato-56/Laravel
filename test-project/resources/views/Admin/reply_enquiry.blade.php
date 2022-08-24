@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>Reply Enquiry</title>
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
                <form action="{{route('reply_enquiry_post')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$enquiry->id}}">
                  <div class="login-form">
                    <h4 class="text-center">Reply Enquiry</h4>
                    <div class="mb-3">
                      <label for="" class="form-label">Name</label>
                      <input type="text" name="name" id="" class="form-control" value="{{$enquiry->name}}" readonly aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">To</label>
                      <input type="text" name="email" id="" class="form-control" value="{{$enquiry->email}}" readonly aria-describedby="helpId">
                    </div>
                   
                    <div class="mb-3">
                        <label for="" class="form-label">Enquiry Message</label>
                        <textarea type="text" class="form-control" name="enquiry_message" readonly id="" rows="5">{{$enquiry->message}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Reply Message</label>
                        <textarea class="form-control" name="reply_message" id="" rows="5"></textarea>
                    </div>
             
                    <div class="mb-3">
                        <button class="btn btn-outline-success btn-sm" type="submit">Reply</button>
                      <a href="" class="btn btn-outline-danger btn-sm" roll="button">Delete</a>
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
    </div>
    <!-- END PAGE CONTAINER-->

</div><!--END PAGE WRAPPER -->
    @include('Admin.common.footer')
</body>