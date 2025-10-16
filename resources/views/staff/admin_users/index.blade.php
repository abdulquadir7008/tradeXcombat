@extends('layouts.app')

@section('content')
<div id="layout-wrapper">
	@include('partials.topheader')
	@include('partials.header')
	@include('partials.sidebar')
            <div class="main-content">



                <div class="page-content">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container-fluid">
						<!-- start page title -->
						<div class="row">
							<div class="col-12">
								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
									<h2 class="mb-sm-0">Staff List</h4>
                                         {{-- @if(isset($currencyedit) && !empty($currencyedit)) --}}
                                    <div class="flex-shrink-0">
                                       <a href="{{ route('adminUsers') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
                                            <i class="bi bi-plus align-middle"></i> Add New

									</button></a>

								    </div>
                                    {{-- @endif --}}
								</div>
							</div>
						</div>
						<!-- end page title -->
						<div class="row mt-2">
							<div class="col">
								<div class="h-100">
									<div class="row">

										<div class="col-xl-12">
											<div class="card">
                                                <div class="card-header align-items-center d-flex">

                                                    {{-- <div class="col-sm">
                                                        <div class="d-flex justify-content-sm-end">
                                                            <div class="search-box ms-2">
                                                                <input type="text" class="form-control search" placeholder="Search...">
                                                                <i class="ri-search-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                   </div> --}}
                                                </div>
												<div class="card-body">

													<div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="stafftable">
															<thead class="table-light">
																<tr>
                                                                    <th>S. No</th>
																	<th scope="col">Staff Detail</th>
																	<th scope="col">Role</th>
                                                                    <th scope="col">Country</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
                                                                    <th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($staffs as $data)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>

																	{{-- <td>{{ ucfirst($data->name) }}</td> --}}
                                                                    <td>
                                                                        <a href="{{ route('editStaff', md5($data->id)) }}" title="View User">
                                                                        <div class="d-flex align-items-center fw-medium">

                                                                            <img src="{{ asset('storage/app/public/' . optional($data)->profile_image ?? 'default-avatar.png') }}" alt="" class="avatar-xxs me-2">
                                                                                        <div>
                                                                                            <p class="mb-0 text-primary ">{{ ucfirst(optional($data)->name ?? 'Unknown') }}</p>
                                                                                            <p class="mb-0 transaction_email text-body">{{ optional($data)->email ?? 'No Email' }}</p>
                                                                                        </div>

                                                                            </div>


                                                                        </div>
                                                                        </a>
                                                                    </td>
                                                                    <td>{{ ucfirst($data->userrole) }}</td>
                                                                    <td>{{ ucfirst($data->country) }}</td>

																	<td>
																	@if($data->is_active == 1)
																	<span class="badge text-success  bg-success-subtle">Active</span>
																	@else
																	<span class="badge text-danger  bg-danger-subtle">InActive</span>
																	@endif
																	</td>
                                                                    <td>{{ $data->created_at }}</td>
																	<td>


                                                                            <a href="{{ route('editStaff', md5($data->id)) }}" class="link-success fs-15"  title="Edit Staff">
                                                                                <i class="ri-edit-2-line"></i>Edit
                                                                            </a>
                                                                            {{-- <form action="{{ route('deletePermission', md5($data->id)) }}" method="POST" class="currency-delete-form" style="display:inline;">
                                                                                @csrf
                                                                                <button type="button" class="btn btn-link p-0 m-0 align-baseline link-danger fs-15 btn-delete-role" title="Delete Permission">
                                                                                    <i class="ri-delete-bin-line"></i>
                                                                                </button>
                                                                            </form> --}}


																	</td>
																</tr><!-- end tr -->
															@empty
																{{-- <tr>
																	<td colspan="8">No Records Found</td>
																</tr> --}}
															@endforelse
															</tbody>
														</table>
													</div>


												</div>

											</div>
										</div>

									</div>
								</div> <!-- end .h-100-->

							</div> <!-- end col -->
						</div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <div>
                    <button type="button" class="btn-success btn-rounded shadow-lg btn btn-icon layout-rightside-btn fs-22"><i class="ri-chat-smile-2-line"></i></button>
                </div>

                @include('partials.footer')
            </div>
            <!-- end main content-->
      </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script>
$(document).ready(function () {
    $('#stafftable').DataTable({
        dom: '<"row p-2"<"col-lg-4 text-center"B><"col-lg-4 text-center"l><"col-lg-4"f>>rtip',

        buttons: [
            // {
            //     extend: 'copy',
            //     text: '<i class="bi bi-clipboard"></i> Copy',
            //     className: 'btn btn-secondary btn-sm me-1'
            // },
            {
                extend: 'csv',
                text: '<i class="bi bi-file-earmark-spreadsheet"></i> CSV',
                className: 'btn btn-primary bg-secondary text-white btn-sm me-1'
            },
            {
                extend: 'excel',
                text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                className: 'btn btn-success bg-info text-white btn-sm me-1'
            },
            {
                extend: 'pdf',
                text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                className: 'btn btn-danger bg-primary text-white btn-sm me-1',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            // {
            //     extend: 'print',
            //     text: '<i class="bi bi-printer"></i> Print',
            //     className: 'btn btn-info bg-primary text-white btn-sm me-1'
            // }
        ],
        paging: true,
        // responsive: true,
        // order: [[0, 'desc']],
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            emptyTable: "No Records Found"
        },
        lengthMenu: [5, 10, 25, 50]
    });
});
</script>ss

@endsection

