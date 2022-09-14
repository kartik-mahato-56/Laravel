<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  @include('Admin.common.head')
  <title>Edit Product</title>
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
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="login-form">
                <h4 class="text-center">Edit Product Details</h4>
                <div class="mb-3">
                  <label for="" class="form-label">Title</label>
                  <input type="text" name="title" id="" class="form-control" value="{{$product->title}}" aria-describedby="helpId">
                </div>
                @if($product->image)
                  <img src="{{asset('products/'.$product->image)}}" height="200px" width="200px" halt="" id="img_product">
                @endif
                <div class="mb-3">
                  <label for="" class="form-label">product image</label>
                  <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId"  onchange="preview()">
                </div>
                <div class="form-check">
                  @if ($product->status == 1)
                  <input class="form-check-input" type="checkbox" checked name="status" value="1" id="">
                      
                  @else
                  <input class="form-check-input" type="checkbox" name="status" value="" id="">
                      
                  @endif
                  <label class="form-check-label" for="">
                    Active
                  </label>
                </div>
                <div class="text-center">
                  <button class="btn btn-success" type="submit">Update</button>
                  <a href="{{route('featured_products')}}" role="button" class="btn btn-primary">Go Back</a>

                </div>
              </div>
            </form>

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