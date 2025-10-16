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
									<h2 class="mb-sm-0">Refer And Earn</h4>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-info btn-md ml-3" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                                            <i class="bi bi-plus align-middle"></i> Add New
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-md ml-3" data-bs-toggle="modal" data-bs-target="#CommissionLevelModal">
                                            <i class="bi bi-plus align-middle"></i> Add Commission Level
                                        </button>

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
                                                        <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Coin Used</p>
                                                        <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="100">100</span></h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class=" ri-coin-line text-success"></i>
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
                                                            <i class="  ri-coins-line text-info"></i>
                                                        </span>
                                                    </div>
                                                    <div class="text-end flex-grow-1">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total Earning</p>
                                                        <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="30">30</span> </h4>
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
                                                        <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total Referral</p>
                                                        <h4 class="fs-22 fw-semibold mb-3">$<span class="counter-value" data-target="1000">1000</span></h4>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="mdi mdi-account-multiple-outline text-warning"></i>
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
						<div class="row mt-2">
							<div class="col">
								<div class="h-100">
									<div class="row">

										<div class="col-xl-12">
											<div class="card">
                                                <div class="card-header align-items-center d-flex">

                                                    <h3>Referral Programs</h3>
                                                </div>
												<div class="card-body">

													<div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="programsTable">
															<thead class="table-light">
																<tr>
                                                                    <th>S. No</th>
																	<th scope="col">Name</th>
																	<th scope="col">Description</th>
																	<th scope="col">Referral Type</th>
																	<th scope="col">Status</th>
                                                                    <th scope="col">Share Person</th>
                                                                    <th scope="col">Give Away</th>
																	<th scope="col">Created At</th>
                                                                    <th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($programs as $data)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>

																	<td>{{ ucfirst($data->name) }}</td>
                                                                    <td>{{ ucfirst($data->description) }}</td>
                                                                    <td>{{ ucfirst($data->referral_type) }}</td>
																	<td>
																	@if($data->is_active == 1)
																	<span class="badge text-success  bg-success-subtle">Active</span>
																	@else
																	<span class="badge text-danger  bg-danger-subtle">InActive</span>
																	@endif
																	</td>
                                                                    <td><i class="ri-user-fill me-2"></i> {{ $data->share_person }} Person</td>
                                                                    <td>{{ $data->giveaway }}</td>
                                                                    <td>{{ $data->created_at }}</td>
																	<td>


                                                                            <a href="javascript:void(0);" class="link-success fs-15 edit-program-btn" data-id="{{ md5($data->id) }}" title="Edit Program">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </a>
                                                                            <form action="{{ route('deleteProgram', md5($data->id)) }}" method="POST" class="currency-delete-form" style="display:inline;">
                                                                                @csrf
                                                                                <button type="button" class="btn btn-link p-0 m-0 align-baseline link-danger fs-15 btn-delete-program" title="Delete Program">
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
                        <div class="row mt-2">
							<div class="col">
								<div class="h-100">
									<div class="row">

										<div class="col-xl-12">
											<div class="card">
                                                <div class="card-header align-items-center d-flex">

                                                    <h3>Commission Levels</h3>
                                                </div>
												<div class="card-body">

													<div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="levelsTable">
															<thead class="table-light">
																<tr>
                                                                    <th>S. No</th>
																	<th scope="col">Level</th>
																	<th scope="col">Percentage</th>
																	<th scope="col">Created At</th>
                                                                    <th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($levels as $data)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>

																	<td>{{ ucfirst($data->level) }}</td>
                                                                    <td>{{ ucfirst($data->commission_rate) }} %</td>

                                                                    <td>{{ $data->created_at }}</td>
																	<td>


                                                                            <a href="javascript:void(0);" class="link-success fs-15 edit-level-btn" data-id="{{ md5($data->id) }}" title="Edit Level">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </a>
                                                                            <form action="{{ route('deletelevel', md5($data->id)) }}" method="POST" class="currency-delete-form" style="display:inline;">
                                                                                @csrf
                                                                                <button type="button" class="btn btn-link p-0 m-0 align-baseline link-danger fs-15 btn-delete-program" title="Delete Level">
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

<div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Create/Update Referral Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" action="{{ route('createProgram') }}" novalidate>
                    @csrf
                    <div class="row g-3">

                        {{-- First Row: Role Name & Share Person --}}
                        <div class="col-xl-6">
                            <label for="validationProgramName" class="form-label">Program Name</label>
                            <input type="text"
                                class="form-control"
                                name="name"
                                id="validationProgramName"
                                placeholder="Enter Program name"
                                required
                                value="{{ old('name') }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter program name.</div>
                        </div>

                       <div class="col-xl-6">
                            <label for="validationSharePerson" class="form-label">Share Person</label>
                            <input type="number"
                                class="form-control"
                                name="share_person"
                                id="validationSharePerson"
                                placeholder="Enter number of share persons"
                                required
                                min="1"
                                step="1"
                                value="{{ old('share_person') }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter a valid number of share persons.</div>
                        </div>

                        {{-- Referral Type --}}
                        <div class="col-xl-12">
                            <label for="validationReferralType" class="form-label">Referral Type</label>
                            <select class="form-select" id="validationReferralType" name="referral_type" required>
                                <option value="">-- Select Referral Type --</option>
                                <option value="deposit" {{ old('referral_type') == 'deposit' ? 'selected' : '' }}>Deposit</option>
                                <option value="registration" {{ old('referral_type') == 'registration' ? 'selected' : '' }}>Registration</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select a referral type.</div>
                        </div>



                        {{-- Second Row: Giveaway --}}
                        <div class="col-xxl-12">
                            <label for="validationGiveaway" class="form-label">Giveaway</label>
                            <input type="text"
                                class="form-control"
                                name="giveaway"
                                id="validationGiveaway"
                                placeholder="Enter giveaway details"
                                required
                                value="{{ old('giveaway') }}">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter giveaway information.</div>
                        </div>

                        {{-- Third Row: Description --}}
                        <div class="col-xxl-12">
                            <label for="validationProgramDesc" class="form-label">Description</label>
                            <textarea class="form-control"
                                    name="description"
                                    id="validationProgramDesc"
                                    placeholder="Enter Program description"
                                    required>{{ old('description') }}</textarea>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter a description.</div>
                        </div>

                        {{-- Status --}}
                        <div class="col-xxl-6">
                            <label for="validationProgramStatus" class="form-label">Status</label>
                            <select class="form-select" id="validationProgramStatus" name="is_active" required>
                                <option value="">-- Select Status --</option>
                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select a status.</div>
                        </div>

                        <input type="hidden" name="program_id" value="">

                        {{-- Buttons --}}
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<!-- Add Commission Modal -->
<div class="modal fade" id="CommissionLevelModal" tabindex="-1" aria-labelledby="addCommissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('createCommissionlevel') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCommissionModalLabel">Create/Update Commission Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-xl-6">
                            <label for="level" class="form-label">Level</label>
                            <input type="number" class="form-control @error('level') is-invalid @enderror"
                                id="level" name="level" required min="1"
                                placeholder="Enter level (e.g., 1, 2, 3)"
                                value="{{ old('level') }}">
                            {{-- @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>

                        <div class="mb-3 col-xl-6">
                            <label for="commission_rate" class="form-label">Commission Rate (%)</label>
                            <input type="number" step="0.0001" min="0" max="100"
                                class="form-control @error('commission_rate') is-invalid @enderror"
                                id="commission_rate" name="commission_rate" required
                                placeholder="Enter rate (e.g., 5)"
                                value="{{ old('commission_rate') }}">
                            {{-- @error('commission_rate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>
                    </div>

                    <input type="hidden" name="level_id" value="{{ old('level_id') }}">
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
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
    $('#programsTable').DataTable({
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
    $('.edit-program-btn').on('click', function () {
            var programId = $(this).data('id');

            $.ajax({
                url: '/edit_program',
                type: 'POST',
                data: {
                    id: programId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    // console.log(data);
                    $('#validationProgramName').val(data.name);
                    $('#validationProgramDesc').val(data.description);
                    $('#validationProgramStatus').val(data.is_active);
                    $('#validationReferralType').val(data.referral_type);
                    $('#validationGiveaway').val(data.giveaway);
                    $('#validationSharePerson').val(data.share_person);
                    $('input[name="program_id"]').val(programId);

                    $('form').attr('action', '/update_program');

                    // $('form button[type="submit"]').text('Update');

                    $('#addProgramModal').modal('show');
                },
                error: function () {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong while fetching Program data!',
                    // footer: '<strong>Error:</strong> ' + xhr.responseText
                });
                }
            });
    });
    const deleteButtons = document.querySelectorAll('.btn-delete-program');

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

                        customClass: {
                            confirmButton: "btn btn-secondary mt-2"
                        },
                        buttonsStyling: false
                    });
                }
            });
        });
    });
    $('#addProgramModal').on('hidden.bs.modal', function () {
    // Reset form fields
    $(this).find('form')[0].reset();

    // Optional: clear hidden input (like program_id)
    $(this).find('input[name="program_id"]').val('');

    // Optional: reset form action if needed
    $(this).find('form').attr('action', '/create_program'); // or your default action
});
$('#levelsTable').DataTable({
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

     $('.edit-level-btn').on('click', function () {
            var levelId = $(this).data('id');

            $.ajax({
                url: '/edit_level',
                type: 'POST',
                data: {
                    id: levelId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    $('#level').val(data.level);
                    $('#commission_rate').val(data.commission_rate);
                    $('input[name="level_id"]').val(levelId);

                    $('form').attr('action', '/update_level');

                    // $('form button[type="submit"]').text('Update');

                    $('#CommissionLevelModal').modal('show');
                },
                error: function () {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong while fetching Commission Level!',
                });
                }
            });
    });
     $('#CommissionLevelModal').on('hidden.bs.modal', function ()
     {
    $(this).find('form')[0].reset();

    $(this).find('input[name="level_id"]').val('');

    $(this).find('.is-invalid').removeClass('is-invalid');

    $(this).find('form').attr('action', '/create_commission_level');
     });

});
</script>
@endsection
