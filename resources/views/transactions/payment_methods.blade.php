@extends('layouts.app')

@section('content')
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
									<h2 class="mb-sm-0">Payment Methods</h4>
                                         @if(isset($paymentedit) && !empty($paymentedit))
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('paymentmethods') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
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
														<table class="table table-centered align-middle table-nowrap mb-0" id="methodsTable">
															<thead class="table-light">
																<tr>
																	<th scope="col">Method Name</th>
																	<th scope="col">Min Amount</th>
																	<th scope="col">Max Amount</th>
																	<th scope="col">Icon</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
																	<th scope="col">Updated At</th>

																	<th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($methods as $method)
																<tr>

																	<td>{{ $method->method_name }}</td>
                                                                    <td>{{ $method->min_amount }}</td>
                                                                    <td>{{ $method->max_amount }}</td>

																	<td>
																		<div class="d-flex align-items-center">
																			<div class="flex-shrink-0 me-2">

                                                                                @if(!empty($method->method_icon) && Storage::disk('public')->exists($method->method_icon))
																				<img src="{{ asset('storage/app/public/' . $method->method_icon) }}" alt="" class="avatar-xs rounded-circle" />
                                                                                @else
                                                                                <img src="{{ asset('/assets/images/payment.png') }}" alt="" class="avatar-xs rounded-circle" />
                                                                                @endif
																			</div>
																		</div>
																	</td>
																	<td>
																	@if($method->status == 1)
																	<span class="badge text-success  bg-success-subtle">Active</span>
																	@else
																	<span class="badge text-danger  bg-danger-subtle">InActive</span>
																	@endif
																	</td>
                                                                    <td>{{ $method->created_at }}</td>
                                                                     <td>{{ $method->updated_at }}</td>
																	<td>
																		<div class="hstack gap-3 flex-wrap">
																			<a href="{{ route('editpayment', $method->id) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i> Edit </a>
																		</div>
																	</td>
																</tr><!-- end tr -->
															@empty
																<tr>
																	<td colspan="8">No Records Found</td>
																</tr>
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
													<form class="row g-3 needs-validation" novalidate method="POST" name="storepayment" action="{{ isset($paymentedit) && isset($paymentedit['id']) ? route('storeeditpayment', $paymentedit['id']) : route('storepayment')  }}" enctype="multipart/form-data" >
													@csrf
													@if(isset($paymentedit) && isset($paymentedit['id']))
														@method('PUT')
													@endif

														<div class="col-12">
															<label for="validationCustom01" class="form-label">Payment Method Name</label>
															<input type="text" class="form-control" name="method_name" id="validationCustom01" required value="{{ old('method_name', $paymentedit['method_name'] ?? '') }}" />
															<div class="valid-feedback">
																Looks good!
															</div>


														</div>









														<div class="col-md-6 col-sm-12">
															<label for="validationCustom06" class="form-label">Minimum Withdrawal </label>
															<input type="number" class="form-control" name="min_amount" id="validationCustom06" required value="{{ old('min_amount', $paymentedit['min_amount'] ?? '') }}" />
															<div class="valid-feedback">
																Looks good!
															</div>


														</div>

														<div class="col-md-6 col-sm-12">
															<label for="validationCustom07" class="form-label">Maximum Withdrawal</label>
															<input type="number" class="form-control" name="max_amount" id="validationCustom07" required value="{{ old('max_amount', $paymentedit['max_amount'] ?? '') }}" />
															<div class="valid-feedback">
																Looks good!
															</div>


														</div>

														<div class="col-12">
															<label for="validationCustom06" class="form-label">Icon</label>
															<input type="file" class="form-control" name="method_icon" id="validationCustom06" {{ isset($paymentedit['method_icon']) ? '' : 'required' }} />
															<div class="valid-feedback">
																Looks good!
															</div>


															@if(isset($paymentedit) && isset($paymentedit['id']))
															<div class="d-flex align-items-center">
																<div class="flex-shrink-0 me-2">
																	<img src="{{ asset('storage/app/public/' . $paymentedit['method_icon']) }}" alt="" class="avatar-xs rounded-circle" />
																</div>
															</div>
															@endif
														</div>

														<div class="col-12">
															<label for="validationCustom07" class="form-label">Status</label>
															<select class="form-select" id="validationCustom07" name="status" required>
																<option value="1" {{ old('status', $paymentedit['status'] ?? 1) == 1 ? 'selected' : '' }}>Active</option>
																<option value="0" {{ old('status', $paymentedit['status'] ?? 0) == 0 ? 'selected' : '' }}>InActive</option>
															</select>
															<div class="invalid-feedback">
																Please select a Status.
															</div>
														</div>

														<div class="col-12">
															<button class="btn btn-primary w-100" type="submit">{{ isset($paymentedit) && isset($paymentedit['id']) ? 'Update' : 'Create' }}</button>
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
    $('#methodsTable').DataTable({
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
            sSearch: '',
            emptyTable: "No Records Found"
        },
        lengthMenu: [5, 10, 25, 50]
    });
});

</script>
@endsection
