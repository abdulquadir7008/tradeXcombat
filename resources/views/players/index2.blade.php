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
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Players List</h4>

                                <div class="flex-shrink-0">
									{{-- <button type="button" class="btn btn-soft-info btn-md mr-2">
										<i class="ri-file-list-3-line align-middle"></i> Export
									</button> --}}

									<a href="{{ route('createplayer') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
                                            <i class="bi bi-plus align-middle"></i> Add New

									</button></a>
								</div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-xl-12">
							<div class="row">
								<div class="col-xl-4 col-md-4 col-sm-12">
									<!-- card -->
									<div class="card card-animate">
										<div class="card-body">
											<div class="d-flex justify-content-between">
												<div class="flex-grow-1">
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total Users</p>
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $data->count() }}">{{ $data->count() }}</span></h4>
													{{-- <div class="d-flex align-items-center gap-2">
														<h5 class="text-success fs-12 mb-0">
															<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +18.30 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div> --}}
												</div>
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-success-subtle rounded fs-3">
														<i class=" ri-team-line text-success"></i>
													</span>
												</div>
											</div>
										</div><!-- end card body -->
										<div class="animation-effect-6 text-success opacity-25 fs-18">
											<i class="bi bi-currency-dollar"></i>
										</div>
										<div class="animation-effect-4 text-success opacity-25 fs-18">
											<i class="bi bi-currency-pound"></i>
										</div>
										<div class="animation-effect-3 text-success opacity-25 fs-18">
											<i class="bi bi-currency-euro"></i>
										</div>
									</div><!-- end card -->
								</div><!-- end col -->
                                <div class="col-xl-4 col-md-4 col-sm-12">
									<!-- card -->
									<div class="card card-animate">
										<div class="card-body">
											<div class="d-flex justify-content-between">
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-info-subtle rounded fs-3">
														<i class=" ri-user-follow-fill text-info"></i>
													</span>
												</div>
												<div class="text-end flex-grow-1">
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Active Users</p>
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $activeCount }}">{{ $activeCount }}</span> </h4>
													{{-- <div class="d-flex align-items-center justify-content-end gap-2">
														<h5 class="text-danger fs-12 mb-0">
															<i class="ri-arrow-right-down-line fs-13 align-middle"></i> -2.74 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div> --}}
												</div>
											</div>
										</div><!-- end card body -->
										<div class="animation-effect-6 text-info opacity-25 left fs-18">
											<i class="bi bi-handbag"></i>
										</div>
										<div class="animation-effect-4 text-info opacity-25 left fs-18">
											<i class="bi bi-shop"></i>
										</div>
										<div class="animation-effect-3 text-info opacity-25 left fs-18">
											<i class="bi bi-bag-check"></i>
										</div>
									</div><!-- end card -->
								</div><!-- end col -->

								<div class="col-xl-4 col-md-4 col-sm-12">
									<!-- card -->
									<div class="card card-animate">
										<div class="card-body">
											<div class="d-flex justify-content-between">
												<div class="flex-grow-1">
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Banned Users</p>
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $bannedCount }}">{{ $bannedCount }}</span> </h4>
													{{-- <div class="d-flex align-items-center gap-2">
														<h5 class="text-success fs-12 mb-0">
															<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div> --}}
												</div>
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-warning-subtle rounded fs-3">
														<i class=" ri-user-unfollow-fill text-warning"></i>
													</span>
												</div>
											</div>
										</div><!-- end card body -->
										<div class="animation-effect-6 text-warning opacity-25 fs-18">
											<i class="bi bi-person"></i>
										</div>
										<div class="animation-effect-4 text-warning opacity-25 fs-18">
											<i class="bi bi-person-fill"></i>
										</div>
										<div class="animation-effect-3 text-warning opacity-25 fs-18">
											<i class="bi bi-people"></i>
										</div>
									</div><!-- end card -->
								</div><!-- end col -->


							</div> <!-- end row-->
						</div>
					</div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">


                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            {{-- <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                                </div>
                                            </div> --}}
                                            {{-- <h4>Players List</h4> --}}
                                            {{-- <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div class="search-box ms-2">
                                                        <input type="text" class="form-control search" placeholder="Search...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="playerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        {{-- <th scope="col" style="width: 50px;">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                            </div>
                                                        </th> --}}
                                                        <th>S. No</th>
                                                         <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Join Date</th>
                                                        <th scope="col">Country</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                        @foreach ($data as $key => $user)

                                                    <tr>
                                                        {{-- <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                            </div>
                                                        </th> --}}
                                                        <td>{{ $loop->iteration }}</td>
                                                         <td>
                                                                        <div class="d-flex align-items-center">
                                                                           <div class="flex-shrink-0 me-2">
                                                                                @if(!empty($user->profile_image) && Storage::disk('public')->exists($user->profile_image))
                                                                                <img src="{{ asset('storage/app/public/' . $user->profile_image) }}" alt="" class="avatar-xs rounded-circle" />
                                                                                @else
                                                                                <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle" />

                                                                                @endif
                                                                            </div>
                                                                            <div class="flex-grow-1"> <span class="customer_name text-white">{{ ucfirst($user->name) }}</span></div>
                                                                        </div>
                                                                    </td>
                                                                    <td><span class="email">{{ $user->email }}</span></td>
                                                                    <td><span class="phone">{{ $user->phone }}</span></td>
                                                                    <td><span class="date">{{ date('Y-m-d', strtotime($user->created_at)); }}</span></td>
																	<td>{{ $user->country }}</td>
                                                                    <td>
                                                                        @if($user->is_active == 1)
                                                                        <span class="badge text-success  bg-success-subtle">Active</span>
                                                                        @elseif($user->is_active == 0)
                                                                        <span class="badge text-danger  bg-danger-subtle">Inactive</span>
                                                                        @elseif($user->is_active == 2)
                                                                        <span class="badge text-warning  bg-warning-subtle">Banned</span>

                                                                        @endif
                                                                    </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <a href="{{ route('viewplayer', md5($user->id)) }}" class="link-info fs-15"  title="Click to view player details">
                                                                            <i class="ri-eye-fill"></i>
                                                                </a>
                                                                <a href="{{ route('editplayer', md5($user->id)) }}" class="link-success fs-15"  title="Click to edit player details">
                                                                    <i class="ri-edit-2-line"></i>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                        @endforeach

                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    {{-- <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mt-3">
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                        </div>

                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end col -->
                    </div>
                </div>
            </div>
    </div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: ['customer_name', 'email', 'phone', 'date', 'country', 'status'],
        page: 5,
        pagination: true
    };

    var customerList = new List('customerList', options);
</script> --}}
<!-- DataTables Setup -->
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
    $('#playerTable').DataTable({
        // dom: '<"row mb-3"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>rtip',
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
            sSearch: ''
        },
        lengthMenu: [5, 10, 25, 50],
        "initComplete": function() {
            this.api().columns().every(function() {
                var column = this;
                if (column.index() == 5 || column.index() == 6 ) {
                    $(column.header()).append("<br>")
                    var select = $(
                            '<select><option value=""></option></select>')
                        .appendTo($(column.header()))
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true,
                                    false)
                                .draw();
                        });
                    column.data().unique().sort().each(function(d, j) {
                        var text = $('<div>').html(d).text(); // Remove HTML tags
                        select.append('<option value="' + text + '">' + text + '</option>');
                    });

                } //end of if

            });
        },
    });
});

</script>
@endsection
