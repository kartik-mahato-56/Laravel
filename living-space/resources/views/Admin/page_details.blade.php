@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>Page Deatils</title>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#mainpage').on('change', function(e) {
        var mainpage_id = e.target.value;
        $.ajax({
          url: "{{route('getsubpage')}}",
          type: "GET",
          data: {
            mainPageId: mainpage_id
          }, 

          success: function(data) {
            $('#pageImage').empty();
            $('#description').empty();
            if(data.mainPage.sub_menu == 0){
              $('#description').append(data.mainPage.description);
            }

            if(data.pageImage){
              $('.image-section').css({
                  display: "grid",
                  visibility: "visible"
                });
              
                $('#pageImage').empty();
                $.each(data.pageImage.images.split(','), function(key, value) {
                
                  let pageImage = "Gallery/" + value;
                  $('#pageImage').append('<label for="'+key+'" class="imgfocus"><img src="{{ asset('') }}' +pageImage +'" hight="200px" width="200px" value="'+key+'" class="imagediv" tabindex="1" /></label><input type="checkbox" class="imgcheckbox" name="imageIndex[]" multiple value="'+key+'" id="'+key+'">&nbsp;&nbsp');
                
                });
            }
            
            if (data.mainPage.sub_menu > 0) {
              $('#subpagediv').css({
                display: "grid",
                visibility: "visible"
              });
              $('#subpage').empty();    
              $         
              $('#subpage').append('<option value="" hidden>Choose Sub menu</option>');
              $.each(data.subpage, function(key, value) {
                $('#subpage').append('<option value="' + value.id +'">' + value.name + '</option>');
              });
            }
            
          }
          
        });
      });
      $('#subpage').on('change', function(e){
        var subPageId = e.target.value;
        $.ajax({
          url: "{{route('getsubpagedetails')}}",
          type: "GET",
          data:{
            subpage_Id: subPageId
          },
          success:function(data){
    
            $('#description').empty();
            $('#description').append(data.subPageDeatils.description);
            $('#pageImage').empty();
            if(data.pageImage){
              $('.image-section').css({
                  display: "grid",
                  visibility: "visible"
                });
              
                $('#pageImage').empty();
                $.each(data.pageImage.images.split(','), function(key, value) {
                
                  let pageImage = "Gallery/" + value;
                  $('#pageImage').append('<label for="'+key+'" class="imgfocus"><img src="{{ asset('') }}' +pageImage +'" hight="200px" width="200px" value="'+key+'" class="imagediv" tabindex="1" /></label><input type="checkbox" class="imgcheckbox" name="imageIndex[]" multiple value="'+key+'" id="'+key+'">&nbsp;&nbsp');
                
                });
            }
          }
        });
      });
    });
</script>
<style>
    #subpagediv {
        display: none;
        visibility: hidden;
    }
    /* .imagediv:focus{
      border: 4px solid rgb(3, 67, 104);
      cursor: pointer;
    } */
    .image-section:focus{
      border: 4px solid rgb(3, 67, 104);
      cursor: pointer;
    }
    .image-section{
      display: none;
      visibility: hidden;
    }
    .imagediv:focus{
      border:5px solid blue;
    }

</style>

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
                        <form action="{{ route('page_details_submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="login-form">
                                @if (session('status'))
                                    <span class="text-success">{{ session('status') }}</span>
                                @endif

                                <h3 class="text-center">Page Details</h3>
                                <div class="mb-3">
                                    <label for="" class="form-label">Select Main Page</label>
                                    <select class="form-control" name="mainPageId" id="mainpage">
                                        <option value="">-- select --</option>
                                        @foreach ($mainPage as $page)
                                            <option value="{{ $page->id }}">{{ $page->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" id="subpagediv">
                                    <label for="" class="form-label">Select Sub Page</label>
                                    <select class="form-control" name="subPageId" id="subpage">

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                                <div class="image-section">
                                  <div class="mb-3">
                                    <label for="" class="form-label">Images</label><br>
                                    <div class="image-index" tabindex="1">
                                      <label src="" class="form-label" tabindex="1" alt="" id="pageImage"></label>
                                    </div>
                                  </div>
                                </div>
                                <div class="new-image-div" id="new-image-div">
                                  <label for="newImage" class="form-label btn btn-success btn-sm" role="button">Upload Image</label>
                                  <input type="file" name="images[]" multiple id="newImage" hidden>
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
