<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  @include('Admin.common.head')
  <title>Page Info</title>
</head>
<body class="animsition">
  <!--PAGE WRAPPER -->
  <div class="page-wrapper">
    <!-- HEADER MOBILE -->
    @include('Admin.common.header_mobile')
    <!-- END HEADER MOBILE -->
    <!-- SIDEBAR -->
    @include('Admin.common.sidebar')
    <!-- END SIDEBAR -->
    
    <!-- PAGE CONTAINER -->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      @include('Admin.common.header_desktop')
      <!-- END HEADER DESKTOP -->

        <div class="main-content">
            <div class="section__content">
                <div class="login-content">
                    
                    <div class="login-form">
                        <h4 class="text-center">Page Info</h4>
                        <div class="mb-3">
                          <label for="" class="form-label">Page Name</label>
                          <input type="text"
                            class="form-control" name="" id="" value="{{$page->name}}" aria-describedby="helpId" placeholder="">
                          
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Page Slug</label>
                          <input type="text"
                            class="form-control" name="" id="" value="{{$page->slug}}" aria-describedby="helpId" placeholder="">
                          
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Page Description</label>
                          <textarea class="form-control" name="" id="" rows="3">{{$page->description}}</textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('pages')}}"  role="button" class="btn btn-outline-success btn-sm">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER -->
  </div>
  <!--END PAGE WRAPPER -->
  
  @include('Admin.common.footer')
</body>
</html>
<script type="text/javascript">
  var img1 = document.getElementById('img_banner');
  function preview(){
   
   //console.log(event.target.files[0]);
   var imagePath = URL.createObjectURL(event.target.files[0]);
   //console.log(imagePath);
   img1.src=imagePath;

   img1.style.display='block';
   
  }

  addEventListener("load",function(){
      img1.style.display='block';
  });
  
  </script>