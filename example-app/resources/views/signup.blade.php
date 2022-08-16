<!doctype html>
<html lang="en">
  <head>
    <title>Register Student</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <!-- adding datatable stylesheet -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- addign jquery cdn link -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- adding datatable cdn link -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
        function validateEmail(){
            let form = document.getElementById("form");
            let email = document.getElementById("email");
            let text = document.getElementById("text");

            let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if(email.match(pattern)){
                form.classList.add("valid")
                form.classList.remove("Invalid")
                text.innerHTML = "Your email address is valid.";
                text.style.color= "#00ff00";
            }
            else{
                form.classList.remove("valid");
                form.classList.add("Invalid");
                text.innerHTML = "Your email address is invalid.";
                text.style.color= "#ff0000";
            }
        }
    </script>

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form">
                    <h4 class="text-center">Student Registration</h4>
                    <form method="POST" action="{{route('signup')}}" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <div class="profile_image">

                                <img src="" id="img_prev" style="width: 100px;height: 100px; border-radius:50%;"/>
                                <input type="file" hidden name="profile_image" class="form-control" id="avatar" required onchange="preview()">
                            </div>
                        <label for="avatar" role="button" class="btn btn-primary">Profile Pic</label>
                        </div>
                      
                        <div class="row">
                            <div class="col">
                            <label for="">Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Email</label>
                              <input type="text" class="form-control" name="email" placeholder="example@gmail.com">
                              <span class="text-danger">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                            </div>
                            <div class="col">
                                <label for="">Phone</label>
                              <input type="text" class="form-control" name="phone" placeholder="eg:9857446414">
                              <span class="text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </span>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                                <label for="" class="form-label">Select Qualification</label>
                                <select class="form-control selectpicker" multiple name="course[]" id="">
                                    
                                    @foreach ($data as $item)
                                        <option value="{{$item->id}}">{{$item->qualification}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Password</label>
                                <input type="password"
                                    class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                                    <span class="text-danger">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                          </div>
                        <div class="row">
                           
                                <div class="col">
                                    <label>Upload Images:</label>
                                    <input type="file" multiple name="images[]" class="form-control" id="avatar" required onchange="preview()">
                                </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="button" class="btn btn-primary">Submit</button>
                            <a href="{{route('qualification')}}" id="button" class="btn btn-primary">Add Qualification</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <table id="example" class="display">
                    <thead>
                        <tr><th colspan="7">
                            <h6 class="text-center"><strong>All Students</strong></h6>
                        </th></tr>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Qualification</th>
                        <th>Profile Pic</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                        @foreach ($students as $key=>$item)
                        <tr>

                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>

                        <td>
                            @foreach (getQualification($item->id) as $qual)
                                {{$qual->qualification .","}}
                            @endforeach
                        </td>
                        <td>
                            <img src="{{asset('uploads/students/'.$item->profile_image)}}" height="50px" width="50px" alt="" srcset="">
                        </td>
                        <td>
                            <a href="{{route('show_details', $item->id)}}" role="button" class="btn btn-primary">Info</a>
                            <a href="{{route('edit_details', $item->id)}}" class="btn btn-success" role="button">Update</a>
                            <a href="{{route('delete',$item->id)}}" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  </body>
</html>

{{-- asset('assets/js/bootstrap.min.js')  --}}


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
        img1.style.display='none';
    });
    
    </script>
