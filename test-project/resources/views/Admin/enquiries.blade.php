@include('Admin.common.head')
<title>Enquiries</title>
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
                        <form action="{{route('enquiry_search_post')}}" method="post">
                            @csrf
                                
                                  From: <input type="date" name="fromdate" id="">
                                
                                    To: <input type="date" name="todate" id="">
                               
                                    <button type="submit" class="btn btn-primary">search</button>
                              
                        <table class="table table-borderless table-striped table-earning" id="example">
                            <thead>
                
                                <tr>
                                    <th scope="col">Serial No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>    
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiries as $serial=>$enquiry)
                                    <tr>
                                        <td>{{$serial+1}}</td>
                                        <td>{{$enquiry->name}}</td>
                                        <td>{{$enquiry->email}}</td>   
                                        <td>{{$enquiry->created_at}}</td> 
                                        <td>
                                            @if($enquiry->status == 1)
                                                <span class="text-success">Replied</span>                                                   
                                            @else
                                                <span class="text-danger ">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($enquiry->status == 1)
                                                <a href="" class="btn btn-outline-success">View Reply</a>
                                            @else
                                                <a href="{{route('reply_enquiry',$enquiry->id)}}" role="button" class="btn btn-outline-primary btn-sm">Reply</a>                                                        
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- END MAIN-CINTENT -->
        </div>
        <!-- END MAIN CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->

    @include('Admin.common.footer')

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 
    
    --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</body>
<script>
    $(document).ready(function () {
    $('#example').DataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
    });
});
</script>