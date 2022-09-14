@include('Admin.common.head')
<title>communications List</title>
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>
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
                    <div class="container-fluid">
                        <div class="table-responsive table--no-card m-b-30">
                            <div class="login-form new-page">
                                <a href="{{route('new_main_page')}}" role="button" class="btn btn-outline-primary btn-sm">
                                   New communications <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                            <br>
                            <table class="table table-borderless table-striped table-earning table-data3" id="example">
                                <thead>
                                   
                                     <span class="text-success">
                                         @if(session('message'))
                                         {{session('message')}}
                                         @endif
                                     </span>
                                    
                                  
                                 <tr>
                                    <th scope="col">Serial No</th>
                                    <th scope="col">Admin Name</th>
                                    <th scope="col">User Name</th>
                                    <th>Communication Date</th>
                                    <th scope="col">Action</th>
                                     
                                 </tr>
                                 </thead>
                                <tbody>

                                    @foreach ($communications as $serial => $data)
                                        <tr>
                                            <td>{{$serial+1}}</td>
                                            <td>{{$data->admin->username}}</td>
                                            <td>{{$data->user->username}}</td>
                                            <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                                            <td>
                                                <a href="" class="btn btn-outline-success" role="button" data-toggle="tooltip" data-placement="top" title="click to show info" >
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
                
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @include('Admin.common.footer')

    <script type="text/javascript">
        $(document).ready( function () {
        $('#example').DataTable();
    } );
    
    
    </script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</body>