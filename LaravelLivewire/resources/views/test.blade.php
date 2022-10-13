<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <div class="mb-3">
        <label for="" class="form-label">hello</label>
        <input type="number" class="form-control" name="test" id="test" aria-describedby="helpId"
            placeholder="">

    </div>
    <a href="javascript:void(0)" onclick="testing()">Click Here</a>

</body>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    function testing() {
        var num = $('#test').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('getdata') }}",
            type: "POST",
            data:{
                send_num:num,
                token:"{{csrf_token()}}",
            },

            success: function(result) {
                console.log(result);
            }
        });

    }
</script>

</html>
