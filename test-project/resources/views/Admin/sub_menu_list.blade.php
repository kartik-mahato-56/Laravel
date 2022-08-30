@include('Admin.common.head')
<title>menu Page</title>
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
                            
                            <table class="table table-borderless table-striped table-earning table-data3" id="example">
                                <thead>
                                   
                                     <span class="text-success">
                                         @if(session('message'))
                                         {{session('message')}}
                                         @endif
                                     </span>
                                    
                                  
                                 <tr>
                                     <th scope="col">Serial No</th>
                                     <th scope="col">Name</th>
                                     <th>Parent Menu</th>
                                     <th scope="col">slug</th>
                                     <th scope="col">status</th>
                                     <th>Action</th>
                                     
                                 </tr>
                                 </thead>
                                <tbody>
                                    @foreach ($subMenu as $key=>$menu)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$menu->name}}</td> 
                                        <td>{{$menu->parent_menu}}</td>               
                                        <td>{{$menu->slug}}</td>
                                        <td>
                                            @if ($menu->status == 1)
                                            <a href="" class="btn btn-success" roll="button">Active</a>
                                            @else
                                            <a href="" class="btn btn-danger" roll="button">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline-success btn-sm" role="button">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>

                                            </a>&nbsp;&nbsp;
                                            <a href="" class="btn btn-outline-primary btn-sm" role="button" >
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="" class="btn btn-outline-danger btn-sm" role="button">
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

    <script type="text/javascript">
        $(document).ready( function () {
        $('#example').DataTable();
    } );
    
    
    </script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</body>