<!doctype html>
<html lang="en">
  <head>
    <title>Update Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="container">
        <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$student->id}}">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

                <div class="update-form">
                    <h4 class="text-center">Update Student Details</h4>
                    <div class="text-center">
                      <div class="profile_image">

                        <img src="{{asset('uploads/students/'.$student->profile_image)}}" id="img_prev" style="width: 100px;height: 100px; border-radius:50%;">

                          <input type="file" hidden name="profile_image" class="form-control" id="avatar" onchange="preview()">
                      </div>
                      <label for="avatar" role="button" class="btn btn-primary">Profile Pic</label>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$student->name}}">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$student->email}}">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="phone" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{$student->phone}}">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Select Qualification</label>
                    <select class="form-control selectpicker" multiple name="course[]" id="">
                      @foreach ($data as $qual)
                        @foreach(getQualification($student->id) as $squal)
                          @if($qual->id == $squal->id)
                            <option value="{{$squal->id}}" selected>{{$squal->qualification}}</option>
                          @endif                            
                        @endforeach
                          <option value="{{$qual->id}}">{{$qual->qualification}}</option>
                      @endforeach
                    </select>
                    </div>
                    
                    <div class="mb-3">
                      @foreach (explode(',',$student->images) as $item)
                        <img src="{{asset('uploads/gallery/'.$item)}}" width="100px" height="100px" class="img-thumbnail">  
                      @endforeach
                      <input type="file" class="form-control" name="images[]" multiple id="" placeholder="" aria-describedby="fileHelpId">
                      
                    </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update Details</button>
                  </div>
                  <a href="{{route('signup')}}">Back</a>
                </div>

        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  </body>
</html>


<script type="text/javascript">
  var img1 = document.getElementById('img_prev');
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