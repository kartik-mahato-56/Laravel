<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">


  </head>
  <body>
     <div class="container">
        <div class="show-details">
          <div class="text-center">
          <img src="{{asset('uploads/students/'.$student->profile_image)}}" id="img_prev" style="width: 100px;height: 100px; border-radius:50%;">
        </div><br>
          <h6>Name: {{$student->name}}</h6>
          <h6>Email: {{$student->email}}</h6>
          <h6>Phone: {{$student->phone}}</h6>
          <h6>Qualification: @foreach (getQualification($student->id) as $item)
              {{$item->qualification.","}}
          @endforeach</h6>
          <h6>Photos: </h6><br>
          @foreach (explode(',',$student->images) as $item)
              <img src="{{asset('uploads/gallery/'.$item)}}" width="100px" height="100px" class="img-thumbnail">  
          @endforeach
          <br><br>
          <a href="{{route('index')}}">Go Back</a>
          </div>
        
       </div>
     </div>
  </body>
</html>