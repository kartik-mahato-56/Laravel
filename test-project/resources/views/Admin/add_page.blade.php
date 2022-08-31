@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>New Sub Menu</title>
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
                <form action="{{route('page_submit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="login-form">
                    @if(session('status'))
                        <span class="text-success">{{session('status')}}</span>
                    @endif

                    <h3 class="text-center">Add New Page</h3>
                   
                    <div class="mb-3">
                      <label for="" class="form-label">Page Name</label>
                      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                      
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Select Page Menu</label>
                      <select class="form-control" name="slug" id="">
                        <option value="">select menu</option>
                        @foreach ($slugs as $slug)
                            @foreach ($slug as $item)
                                <option value="{{$item->slug}}">{{$item->name}}</option>
                            @endforeach
                        @endforeach
                      </select>
                      @error('slug')

                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Page Description</label>
                      <textarea class="form-control" name="description" id="" rows="3"></textarea>
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
