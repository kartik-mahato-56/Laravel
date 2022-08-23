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
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                 <tr>
                                     <th scope="col">Serial No</th>
                                     <th scope="col">Name</th>
                                     <th scope="col">Email</th>
                                     <th scope="col">Phone</th>
                                     <th>Enquiry</th>
                                     <th>Date</th>
                                     
                                 </tr>
                                 </thead>
                                <tbody>
                                    @foreach ($enquiries as $serial=>$enquiry)
                                        <tr>
                                            <td>{{$serial+1}}</td>
                                            <td>{{$enquiry->name}}</td>
                                            <td>{{$enquiry->email}}</td>
                                            <td>{{$enquiry->phone}}</td>
                                            <td>{{$enquiry->message}}</td>
                                            <td>{{$enquiry->created_at}}</td>
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