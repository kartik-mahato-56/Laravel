@include('Admin.common.head')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<title>Add image</title>
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
                <form action="{{route('submit_image')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="login-form">
                    <h4 class="text-center">Add Page Image</h4>
                  
                   <div class="mb-3">
                     <label for="" class="form-label">Page Category</label>
                     <select class="form-control" name="category" id="">
                       @foreach ($pages as $page)
                           
                                <option value="{{$page->slug}}">{{$page->name}}</option>
                            
                       @endforeach
                     </select>
                     @error('category')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                   </div>
                   
                   <div class="mb-3">
                       <label for="" class="form-label">Page image</label>
                       <img src="" height="200px" width="200px" halt="" id="img_banner">
                    <input type="file" name="image[]" multiple id="" class="form-control" placeholder="" aria-describedby="helpId"  onchange="preview()">
                    @error('image')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
                   
                    <div class="text-center">
                      <button class="btn btn-success" type="submit">Add Image</button>
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
        img1.style.display='none';
    });
    
    </script>