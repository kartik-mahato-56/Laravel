<!doctype html>
<html lang="en">
  <head>
    <title>Add Qualification</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">

  </head>
  <body>
  
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="course">
                <form action="{{route('addqualification')}}" method="post">
                    @csrf
                <div class="card bg-light">
                    <h4 class="card-title mt-3 text-center">Add Qualification</h4>

                    <div class="mb-3">
                        <label for="qualification" class="form-label">Enter Qualification</label>
                        <input type="text"
                        class="form-control" name="qualification" id="qualification" aria-describedby="helpId" placeholder="">
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <a href="{{route('signup')}}">Back</a>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Qualification</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($qual as $id=>$value)
                        <tr>
                            <th scope="row">{{$id+1}}</th>
                            <td>{{$value->qualification}}</td>
                            <td>
                                <a href="{{route('edit_qualification', $value->id)}}" class="btn btn-success" role="button">Edit</a>
                                <a href="{{route('delete',$value->id)}}" class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
  </body>
</html>
