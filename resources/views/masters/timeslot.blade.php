@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\File;

@endphp
<div id="layout-wrapper">
	@include('partials.topheader')
	@include('partials.header')
	@include('partials.sidebar')

	<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="container-fluid">
						<!-- start page title -->
						<div class="row">
							<div class="col-12">
								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
									<h2 class="mb-sm-0">Time Slots</h4>
                                         @if(isset($slotedit) && !empty($slotedit))
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('TimeSlots') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
                                                <i class="bi bi-plus align-middle"></i> Add New
                                        </button></a>
								    </div>
                                    @endif
								</div>
							</div>
						</div>
						<!-- end page title -->
						<div class="row mt-2">
							<div class="col">
								<div class="h-100">
									<div class="row">
										<div class="col-sm-12 col-md-8">
											<div class="card">
												<div class="card-body">
													<div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="timeslotTable">
															<thead class="table-light">
																<tr>
                                                                    <th>S. No</th>
																	<th scope="col">TimeSlot</th>
																	<th scope="col">Combat</th>
																	<th scope="col">Duration</th>
																	<th scope="col">Status</th>
																	<th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($timeslot as $com)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>
																	<td>{{ $com->timeslot }}</td>
																	<td>{{ $com->combatType->name }}</td>
																	<td>{{ $com->duration }}</td>


																	<td>
																	@if($com->is_active == 1)
																	<span class="badge text-success  bg-success-subtle">Active</span>
																	@else
																	<span class="badge text-danger  bg-danger-subtle">InActive</span>
																	@endif
																	</td>
																	<td>
																		<div class="hstack gap-3 flex-wrap">
																			<a href="{{ route('editTimeslot', $com->id) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i> Edit </a>
																		</div>
																	</td>
																</tr><!-- end tr -->
															@empty
																{{-- <tr>
																	<td colspan="4">No Records Found</td>
																</tr> --}}
															@endforelse
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12 col-md-4">
											<div class="card">

												<div class="card-body">
													<form class="row g-3 needs-validation" novalidate method="POST" name="storeslot" action="{{ isset($slotedit) && isset($slotedit['id']) ? route('storeeditslot', $slotedit['id']) : route('storeTimeslot')  }}" enctype="multipart/form-data">
													@csrf
													@if(isset($slotedit) && isset($slotedit['id']))
														@method('PUT')
													@endif
														<div class="col-12">
                                                        <label for="timeslot" class="form-label">Time Slot</label>
                                                        <input type="number" class="form-control" name="timeslot" id="timeslot" required min="1"
                                                            value="{{ old('timeslot', $slotedit['timeslot'] ?? '') }}" />
                                                        <div class="invalid-feedback">
                                                            Please enter a valid timeslot .
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="combat_id" class="form-label">Combat Type</label>
                                                        <select class="form-select" name="combat_id" id="combat_id" required>
                                                            <option value="">Select Combat Type</option>
                                                            @foreach ($combatTypes as $combat)
                                                                <option value="{{ $combat->id }}"
                                                                    {{ old('combat_id', $slotedit['combat_id'] ?? '') == $combat->id ? 'selected' : '' }}>
                                                                    {{ $combat->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a combat type.
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="duration" class="form-label">Duration</label>
                                                        <input type="text" class="form-control" name="duration" id="duration" required
                                                            value="{{ old('duration', $slotedit['duration'] ?? '') }}" />
                                                        <div class="invalid-feedback">
                                                            Please enter a duration.
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="is_active" class="form-label">Status</label>
                                                        <select class="form-select" name="is_active" id="is_active" required>
                                                            <option value="1" {{ old('is_active', $slotedit['is_active'] ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ old('is_active', $slotedit['is_active'] ?? 0) == 0 ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a status.
                                                        </div>
                                                    </div>


														<div class="col-12">
															<button class="btn btn-primary w-100" type="submit">{{ isset($slotedit) && isset($slotedit['id']) ? 'Update' : 'Create' }}</button>
														</div>
													</form>
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
    $('#timeslotTable').DataTable({
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

        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            emptyTable: "No Records Found"
        },
        lengthMenu: [5, 10, 25, 50]
    });
});

</script>
@endsection
