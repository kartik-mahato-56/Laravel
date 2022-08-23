@include('Admin.common.head')
<title>Banner Page</title>
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                     <span class="text-success">
                                         @if(session('message'))
                                         {{session('message')}}
                                         @endif
                                     </span>
                                     <th>
                                         <a href="{{route('new_banner')}}" class="btn btn-primary">
                                         New Banner &nbsp; <i class="fa fa-plus-circle" aria-hidden="true"></i>
                     
                                         </a>
                                     </th>
                                    </tr>
                                 <tr>
                                     <th scope="col">Serial No</th>
                                     <th scope="col">Title</th>
                                     <th scope="col">Image</th>
                                     <th scope="col">status</th>
                                     <th>Action</th>
                                     
                                 </tr>
                                 </thead>
                                <tbody>
                                    @foreach ($banners as $key=>$banner)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$banner->title}}</td>                
                                        <td>
                                            <img src="{{asset('banners/'.$banner->image)}}" height="100px"  width="100px" alt="">
                                        </td>
                                        <td>
                                            @if ($banner->status == 1)
                                            <a href="{{route('banner_status', $banner->id)}}" class="btn btn-success" roll="button">Active</a>
                                            @else
                                            <a href="{{route('banner_status', $banner->id)}}" class="btn btn-danger" roll="button">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('view_banner',$banner->id)}}" class="text-success">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>

                                            </a>&nbsp;&nbsp;
                                            <a href="{{route('banner_edit',$banner->id )}}" >
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="{{route('delete_banner',$banner->id)}}" class="text-danger">
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