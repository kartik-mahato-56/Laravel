@include('Admin.common.head')
<title>Page list</title>
</head>

<body class="animsition">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
		@include('Admin.common.header_mobile')
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		@include('Admin.common.sidebar')
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			@include('Admin.common.header_desktop')
            <!-- END HEADER DESKTOP-->

			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content">
                    <div class="container-fluid">
                        <div class="table-responsive table--no-card m-b-30">
                           <table class="table table-borderless table-striped table-earning table-data3" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial No</th>
                                        <th scope="col">Main Page</th>
                                        <th scope="col">Sub Pages</th>
                                        <th scope="col">status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $serial => $page)
                                        <tr>
                                            <td>{{$serial+1}}</td>
                                            <td>{{$page->name}}</td>
                                            
                                            <td>
                                                @if($page->sub_menu != 0)
                                             
                                                    @foreach ((subMenu($page->id)) as $subPage)
                                                     <span>{{$subPage->name}}</span>
                                                        <br>
                                                    @endforeach
                                                
                                                @else
                                                    <span>No sub pages</span>
                                                @endif
                                            </td>
                                           
                                            <td>
                                                @if($page->status == 1)
                                                    <a href="http://" roll='button' class="btn btn-success btn-sm"  data-toggle="tooltip" data-placement="top" title="click to inactive">Active</a>
                                                    @else
                                                    <a href="http://" roll='button' class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="click to active">Inctive</a>
                                                @endif  
                                            </td>
                                            <td>
                                               @if($page->sub_menu == 0)

                                                    <button type="button" class="btn btn-outline-success btn-sm mb-1" >
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    </button>&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-1" >
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal" data-target="#mediumModal">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>&nbsp;&nbsp;
                                               @else
                                                    <button type="button" class="btn btn-outline-success btn-sm mb-1" data-toggle="modal" data-target="#infoModal">
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    </button>&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-1" data-toggle="modal" data-target="#editModal">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>&nbsp;&nbsp;

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div> <!-- end container-fluid -->
                </div> <!-- end section content dic -->
            </div> <!-- end main-content -->
         
			<!-- end modal small -->

			<!-- modal medium -->
			<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Which page info you want to show?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Main Page</button>
							<button type="button" class="btn btn-primary">Sub Page</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Which page  you want to edit?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Main Page</button>
							<button type="button" class="btn btn-primary">Sub Page</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Which page info you want to delete?
							</p>
						</div>
						<div class="modal-footer">
							<a href="" roll="button" class="btn btn-primary" >Main Page</a>
							<a href="" roll="button" class="btn btn-primary">Sub Page</a>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal medium -->

			
		</div> <!-- END PAGE CONTAINER-->
		

	</div> <!-- End page wrapper -->

	<!-- Jquery JS-->
	@include('Admin.common.footer')

</body>

</html>
<!-- end document-->