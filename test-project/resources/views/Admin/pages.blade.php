@include('Admin.common.head')
<title>Pages</title>
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
                        <div class="login-form">
                            <a href="{{route('new_page')}}" class="btn btn-primary">
                                New Page &nbsp; <i class="fa fa-plus-circle" aria-hidden="true"></i>
            
                                </a>
                        </div>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                            
                                 <tr>
                                     <th scope="col">Serial No</th>
                                     <th scope="col">Name</th>
                                     <th scope="col">Slug</th>
                                     <th scope="col">Action</th>
                                 </tr>
                                 </thead>
                                <tbody>
                                    @foreach ($pages as $key=>$page)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$page->name}}</td>
                                            <td>
                                            {{$page->slug}}
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-outline-success btn-sm">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
    
                                                </a>&nbsp;&nbsp;
                                                <a href="" class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="" class="btn btn-outline-danger btn-sm">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
    
                                                </a>
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

</body>