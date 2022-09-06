@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>Page Deatils</title>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mainpage_id').on('change', function(e) {
            var mainpage_id = e.target.value;
            $.ajax({
                url: "{{ route('getsubpage') }}",
                type: "GET",
                data: {
                    mainpage: mainpage_id
                },
                success: function(data) {
                 
                        $('#subpage').empty();
                   
                        $('#subpage').append('<option value="" hidden>Choose Sub menu</option>');
                        $.each(data, function(key, value) {
                            $('#subpage').append('<option value="' + value.id + '">' + value.name + '</option>');
                            
                        });

                } 
                
            });
        });
    });
</script>
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
            <div class="section__content section__content--p30 ">
              <div class="login-content">
                <form action="{{route('page_details_submit')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="login-form">
                    @if(session('status'))
                        <span class="text-success">{{session('status')}}</span>
                    @endif

                    <h3 class="text-center">Page Details</h3>
                    <div class="mb-3">
                      <label for="" class="form-label">Select Main Page</label>
                      <select class="form-control" name="parent_page_id" id="mainpage_id">
                        <option value="">-- select --</option>
                        @foreach ($mainPage as $page)
                            <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Select Sub Page</label>
                      <select class="form-control" name="sub_page_id" id="subpage">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Choose Image</label>
                      <input type="file" class="form-control" name="images[]" multiple id="" placeholder="" aria-describedby="fileHelpId">
                      
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success">Submit Page Details</button>
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