<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  @include('Admin.common.head')
  <title>Show product</title>
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
            <div class="section__content section__content--p30">
                <div class="login-content">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="login-form">
                        <h4 class="text-center">SHow product</h4>
                        <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" id="" class="form-control" value="{{$product->title}}" aria-describedby="helpId">
                        </div>
                        @if($product->image)
                        <img src="{{asset('products/'.$product->image)}}" height="50%" width="50%" halt="" id="img_product">
                        @endif
                        <div class="mb-3">
                        <label for="" class="form-label">product image</label>
                        {{-- <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId"  onchange="preview()"> --}}
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        @if ($product->status == 1)
                        <input type="text" class="form-control" value="ACTIVE" id="" aria-describedby="helpId" placeholder="">   
                        @else
                        <input type="text" class="form-control" value="INACTIVE" id="" aria-describedby="helpId" placeholder="">   
                            
                        @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('featured_products')}}"  role="button" class="btn btn-outline-success btn-sm">Go Back</a>
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
  var img1 = document.getElementById('img_product');
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