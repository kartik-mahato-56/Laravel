@include('Admin.common.head')
<title>Account</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

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
                <form action="{{route('update')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    @php
                        $user = admindata(session('ADMIN_ID'))
                    @endphp
                    <div class="account-form section__content--p30">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <span class="text-success">
                            @if(session('password_changed'))
                            {{session('password_changed')}}
                            @endif
                            @if(session('message'))
                                {{session('message')}}
                            @endif
                        </span>
                        <div class="text-center">
                            <div class="profile_image">
                                @if (!$user->profile_pic)
                                <img src="{{asset('image/user.png')}}" alt="an image should be there" id="img_prev"/>
                                @else
                                <img src="{{asset('users/'.$user->profile_pic)}}" id="img_prev" style="height:100px;width:100x;border-radius: 50%;" alt="">
                                @endif
                                <input type="file" hidden  name="profile_pic" class="form-control" id="avatar" onchange="return preview()">
                                <span class="text-danger" id="error">

                                </span>
                            </div>
                            <label for="avatar" role="button" class="btn btn-outline-success btn-sm">Profile Pic</label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="username" id="" value="{{$user->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="" value="{{$user->email}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" maxlength="10" class="form-control" name="phone" id="" placeholder="enter phone number" value="{{$user->phone}}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

@include('Admin.common.footer')
</body>
</html>

<script>

var savebutton = document.getElementById('savebutton');
var readonly = true;
var inputs = document.querySelectorAll('input[type="text"]');
savebutton.addEventListener('click',function(){

     for (var i=0; i<inputs.length; i++) {
     inputs[i].toggleAttribute('readonly');
     };

    if (savebutton.innerHTML == "edit") {
      savebutton.innerHTML = "save";
         } else {
      savebutton.innerHTML = "edit";
      }




});

</script>
<script type="text/javascript">
    var img1 = document.getElementById('img_prev');
   
    function preview(){

     //console.log(event.target.files[0]);
     var imagePath = URL.createObjectURL(event.target.files[0]);
     //console.log(imagePath);
     img1.src=imagePath;

     img1.style.display='block';

     let fileInput = document.files('avatar');
     let filePath = fileInput.value;
     let validExt = /(\.jpg|\.jpeg|\.png)$/i;
     if(!validExt.exec(filePath)){
        let text = document.getElementById('error');
        text.innerHTML  = "please provide a file which have the extension of .jpg, .jpeg or .png";
        fileInput.value = "";
        return false;
     }


    }

    addEventListener("load",function(){
        img1.style.display='block';
    });

    </script>
    @include('Admin.common.footer')
