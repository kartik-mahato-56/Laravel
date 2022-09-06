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
            <div class="section__content section__content--p30 ">
                <div class="login-content">
                    
                    <div class="login-form">
                        <h4 class="text-center">Page Info</h4>
                        <div class="mb-3">
                          <label for="" class="form-label">Page Name</label>
                          <input type="text"
                            class="form-control" name="" id="" value="{{$pageInfo->name}}">
                         
                        </div>
                        @if($pageInfo->sub_menu_status != 0)
                            <div class="mb-3">
                              <label for="" class="form-label">Sub Pages</label>
                              <select class="form-control" name="" id="">
                                @foreach (subMenu($pageInfo->id) as $subPage)
                                <option>{{$subPage->name}}</option> 
                                @endforeach
                                
                              </select>
                            </div>
                        @else
                        <label for="" class="form-label">Sub Pages</label>
                        <input class="form-control" type="text" placeholder="No Sub Pages" disabled>
                        @endif

                        <div class="mb-3">
                          <label for="" class="form-label">Description</label>
                          <textarea class="form-control" name="" id="" rows="3" readonly>{{$pageInfo->description}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Images</label><br>
                          @if($pageInfo->images != "")
                            @foreach (explode(',',$pageInfo->images) as $image)
                            <img  src="{{asset('Gallery/'.$image)}}" width="200px" height="200px" alt="">&nbsp;&nbsp;
                                
                            @endforeach
                          @else

                          @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('main_page_list')}}" class="btn btn-outline-primary">Back</a>
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