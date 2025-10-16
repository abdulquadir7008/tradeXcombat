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
									<h2 class="mb-sm-0">Permissions</h4>
                                         {{-- @if(isset($currencyedit) && !empty($currencyedit)) --}}
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-info btn-md ml-3" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
                                            <i class="bi bi-plus align-middle"></i> Add New
                                        </button>

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
														<table class="table table-centered align-middle table-nowrap mb-0" id="permissionsTable">
															<thead class="table-light">
																<tr>
                                                                    <th>S. No</th>
																	<th scope="col">Name</th>
																	<th scope="col">Description</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
                                                                    <th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($permissions as $data)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>

																	<td>{{ ucfirst($data->name) }}</td>
                                                                    <td>{{ ucfirst($data->description) }}</td>
																	<td>
																	@if($data->status == 1)
																	<span class="badge text-success  bg-success-subtle">Active</span>
																	@else
																	<span class="badge text-danger  bg-danger-subtle">InActive</span>
																	@endif
																	</td>
                                                                    <td>{{ $data->created_at }}</td>
																	<td>


                                                                            <a href="javascript:void(0);" class="link-success fs-15 edit-permission-btn" data-id="{{ md5($data->id) }}" title="Edit Permission">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </a>
                                                                            <form action="{{ route('deletePermission', md5($data->id)) }}" method="POST" class="currency-delete-form" style="display:inline;">
                                                                                @csrf
                                                                                <button type="button" class="btn btn-link p-0 m-0 align-baseline link-danger fs-15 btn-delete-role" title="Delete Permission">
                                                                                    <i class="ri-delete-bin-line"></i>
                                                                                </button>
                                                                            </form>


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

<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title permission_heading" id="exampleModalgridLabel" >Create/Update Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" action="{{ route('createPermission') }}" novalidate>
                    @csrf
                    <div class="row g-3">

                        {{-- Role Name --}}
                        <div class="col-xxl-6">
                            <div>
                                <label for="validationPermissionName" class="form-label">Permission Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    id="validationPermissionName"
                                    placeholder="Enter Permission name"
                                    required
                                    value="{{ old('name') }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a permission name.</div>
                            </div>
                        </div>

                        {{-- Role Description --}}
                        <div class="col-xxl-6">
                            <div>
                                <label for="validationPermissionDesc" class="form-label">Description</label>
                                <textarea class="form-control"
                                        name="description"
                                        id="validationPermissionDesc"
                                        placeholder="Enter permission description"
                                        required>{{ old('description') }}</textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a description.</div>
                            </div>
                        </div>

                        {{-- Role Status --}}
                        <div class="col-xxl-6">
                            <div>
                                <label for="validationPermissionStatus" class="form-label">Status</label>
                                <select class="form-select" id="validationPermissionStatus" name="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select a status.</div>
                            </div>
                        </div>
                        <input type="hidden" name="permission_id" value="">

                        {{-- Buttons --}}
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit
                                    {{-- {{ isset($permissionedit) ? 'Update' : 'Submit' }} --}}
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
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
    $('#permissionsTable').DataTable({
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
    $('.edit-permission-btn').on('click', function () {
            var permissionId = $(this).data('id');

            $.ajax({
                url: '/edit_permission',
                type: 'POST',
                data: {
                    id: permissionId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    // console.log(data);
                    $('#validationPermissionName').val(data.name);
                    $('#validationPermissionDesc').val(data.description);
                    $('#validationPermissionStatus').val(data.status);

                    $('input[name="permission_id"]').val(permissionId);

                    $('form').attr('action', '/update_permission');

                    // $('.permission_heading').text('Update Permission');

                    // $('form button[type="submit"]').text('Update');

                    $('#addPermissionModal').modal('show');
                },
                error: function () {
                    alert('Something went wrong!');
                }
            });
    });
    const deleteButtons = document.querySelectorAll('.btn-delete-role');

    deleteButtons.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            const form = btn.closest('form');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                // icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                customClass: {
                    confirmButton: "btn btn-info w-xs me-2 mt-2",
                    cancelButton: "btn btn-danger w-xs mt-2"
                },
                buttonsStyling: false,
                showCloseButton: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelled",
                        // text: "Your currency is safe!",
                        // icon: "error",
                        customClass: {
                            confirmButton: "btn btn-secondary mt-2"
                        },
                        buttonsStyling: false
                    });
                }
            });
        });
    });
    // $('#addPermissionModal').on('hidden.bs.modal', function () {
    //     // Clear form fields
    //     $('#validationPermissionName').val('');
    //     $('#validationPermissionDesc').val('');
    //     $('#validationPermissionStatus').val('');
    //     $('input[name="permission_id"]').val('');

    //     // Reset form action using Blade route name
    //     $('form').attr('action', '{{ route("createPermission") }}');

    //     // Reset heading and button text
    //     $('.permission_heading').text('Create New Permission');
    //     $('form button[type="submit"]').text('Create');
    // });

});
</script>
@endsection
