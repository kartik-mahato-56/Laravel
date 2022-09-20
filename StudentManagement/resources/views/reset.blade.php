<!doctype html>
<html lang="en">
  <head>
    <title>Reset Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="margin: 100px">
      
    <h1>You have requested to reset your password</h1>
    <hr>
    <p>We cannot simply send your old password. A unique password reset link has  been generated for you <br>click the following link to reset your password</p>
    <h2><a href="https:://127.0.0.1:300/api/reset/{{$token}}">Click here to reset your password</a></h2>
  </body>
</html>