<!DOCTYPE html>
<html>
@include('Admin.common.head')
<title>Enquires List</title>

</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.common.header_mobile')


        @include('Admin.common.sidebar')

        <div class="page-container">
            @include('Admin.common.header_desktop')

            <div class="main-content">

                <div class="container-fluid">
                    <div class="table-responsive m-b-40">
                        <div class="login-form">
                            <div align="right">
                                <form action="{{ route('enquiry_search_post') }}" method="POST">
                                    @csrf
                                    <div class="pb-2 row">
                                        <div class="col">
                                            <div class="col-md-12">
                                                <label for="">Status</label>
                                                <select name="status" id="" class="au-input">
                                                    <option value="">select status</option>
                                                    <option value="0">Pending</option>
                                                    <option value="1">Replied</option>
                                                </select>&nbsp;&nbsp;
                                                <label for="">From</label>
                                                <input type="date" name="fromdate" class="au-input">

                                                <label for="">To</label>
                                                <input type="date" name="todate" class="au-input ">

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="fa fa-search" aria-hidden="true"></i></label>
                                                </button>


                                            </div>
                                            <div class="col-12-md"> @error('fromdate')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                                @error('todate')
                                                    <span class="text text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                        <div>
                            <table class="table table-borderless table-striped table-earning table-data3"
                                id="example">

                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiries as $key => $enquiry)
                                        <tr>

                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $enquiry->name }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ date('d-m-Y', strtotime($enquiry->created_at)) }}</td>
                                            <td>
                                                @if ($enquiry->status == 1)
                                                    <span class="text-success">Replied</span>
                                                @else
                                                    <span class="text-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($enquiry->status == 0)
                                                    <a href="{{ route('reply_enquiry', $enquiry->id) }}" role="button"
                                                        class="btn btn-outline-primary btn-sm"><i class="fa fa-reply"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                    <a href="{{ route('delete_enquiry', $enquiry->id) }}" role="button"
                                                        class="btn btn-outline-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a>
                                                @else
                                                    <a href="{{ route('reply_enquiry_show', $enquiry->id) }}"
                                                        role="button" class="btn btn-outline-success btn-sm"><i
                                                            class="fa fa-info-circle"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                    <a href="{{ route('delete_enquiry', $enquiry->id) }}"
                                                        role="button" class="btn btn-outline-danger"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                                @endif

                                            </td>s
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('Admin.common.footer')
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
