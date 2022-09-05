@include('Admin.common.head')
<title>Sub Pages List</title>
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
                                <a href="{{route('new_sub_page')}}" role="button" class="btn btn-outline-primary btn-sm">
                                   New Sub Page <i class="fa fa-plus-circle" aria-hidden="true"></i>
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
                                     <th scope="col">Page Name</th>
                                     <th scope="col">Main Page Name</th>
                                     <th scope="col">status</th>
                                     <th>Action</th>
                                     
                                 </tr>
                                 </thead>
                                <tbody>

                                    @foreach ($subPages as $serial => $page)
                                        <tr>
                                            <td>{{$serial+1}}</td>
                                            <td>{{$page->name}}</td>
                                            <td>
                                            @foreach (subMenu($page->parent_menu_id) as $parentPage)
                                                {{$parentPage->name}}    
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($page->status == 1)
                                                    <a href="http://" roll='button' class="btn btn-success btn-sm"  data-toggle="tooltip" data-placement="top" title="click to inactive">Active</a>
                                                @else
                                                    <a href="http://" roll='button' class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="click to active">Inctive</a>
                                                @endif  
                                            </td>
                                            <td>
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