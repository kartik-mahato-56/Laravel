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
                                     <th scope="col">Action</th>
                                     
                                 </tr>
                                 </thead>
                                <tbody>

                                    @foreach ($subPages as $serial => $page)
                                        <tr>
                                            <td>{{$serial+1}}</td>
                                            <td>{{$page->name}}</td>
                                            <td>
                                                {{App\Http\Controllers\PageController::getParentPage($page->parent_menu_id)}}
                                            </td>
                                            <td>
                                                @if($page->status == 1)
                                                    <a href="{{route('sub_page_status',$page->id)}}" roll='button' class="btn btn-success btn-sm"  data-toggle="tooltip" data-placement="top" title="click to inactive">Active</a>
                                                @else
                                                    <a href="{{route('sub_page_status',$page->id)}}" roll='button' class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="click to active">Inctive</a>
                                                @endif  
                                            </td>
                                            <td>
                                                <a href="{{route('restore_sub_page',$page->slug)}}"  type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="click to restore">
                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="" class="btn btn-outline-danger" role="button" data-toggle="tooltip" data-placement="top" title="click to permanent delete" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>&nbsp;&nbsp;
  
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" align="right">
                                                <a href="{{route('sub_page_list')}}" role="button" class="btn btn-outline-secondary">Go Back</a>
                                            </td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
                
            </div> <!-- END MAIN CONTENT-->
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
								zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
								resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
								genus Equus, along with other living equids.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
        </div> <!-- END PAGE CONTAINER-->
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