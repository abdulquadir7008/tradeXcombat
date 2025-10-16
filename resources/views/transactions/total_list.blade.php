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
									<h2 class="mb-sm-0">Transactions</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Finance</a></li>
                                            <li class="breadcrumb-item active">Transactions</li>
                                        </ol>
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
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Overall Transactions</p>
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $totalTransactions }}">{{ $totalTransactions }}</span></h4>
													{{-- <div class="d-flex align-items-center gap-2">
														<h5 class="text-success fs-12 mb-0">
															<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +18.30 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div> --}}
												</div>
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-success-subtle rounded fs-3">
														<i class="bi bi-arrow-left-right text-success"></i>
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
														<i class="bi bi-arrow-up text-info"></i>
													</span>
												</div>
												<div class="text-end flex-grow-1">
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total Deposit</p>
													{{-- <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{!! '$'.' '. $totalwithdrawal !!}">{!! '$'.' '. $totalwithdrawal !!}</span> </h4> --}}
                                                    <h4 class="fs-22 fw-semibold mb-3">
                                                        <span class="text-muted">$</span>
                                                        <span class="counter-value" data-target="{{ $totaldeposit }}"></span>
                                                    </h4>


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
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total Withdrawal</p>
													<h4 class="fs-22 fw-semibold mb-3">
                                                        {{-- <span class="counter-value" data-target="{!! '$'.' '. $totalwithdrawal !!}">{!! '$'.' '. $totalwithdrawal !!}</span>  --}}
                                                         <span class="text-muted">$</span>
                                                        <span class="counter-value" data-target="{{ $totalwithdrawal }}"></span>
                                                    </h4>
													{{-- <div class="d-flex align-items-center gap-2">
														<h5 class="text-success fs-12 mb-0">
															<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div> --}}
												</div>
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-warning-subtle rounded fs-3">
														<i class="bi bi-arrow-down text-warning"></i>
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
                    <div class="row">

                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex justify-content-between align-items-center {{ $filter == 'all' ? 'active' : '' }}"
                                            href="{{ route('transactions', ['filter' => 'all']) }}">
                                                <span>All
                                                <span class="badge bg-success ms-2">{{ $totalTransactions }}</span></span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link d-flex justify-content-between align-items-center {{ $filter == 'deposit' ? 'active' : '' }}"
                                            href="{{ route('transactions', ['filter' => 'deposit']) }}">
                                                <span>Deposit
                                                <span class="badge bg-primary ms-2">{{ $depositCount }}</span></span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link d-flex justify-content-between align-items-center {{ $filter == 'withdrawal' ? 'active' : '' }}"
                                            href="{{ route('transactions', ['filter' => 'withdrawal']) }}">
                                                <span>Withdrawal
                                                <span class="badge bg-danger ms-2">{{ $withdrawalCount }}</span></span>
                                            </a>
                                        </li>


                                    </ul>


                                    <!-- Tab panes -->
                                    {{-- <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="home1" role="tabpanel">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR.
                                                    <div class="mt-2">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">Read More <i class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile1" role="tabpanel">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown.
                                                    <div class="mt-2">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">Read More <i class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="messages1" role="tabpanel">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                                    <div class="mt-2">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">Read More <i class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="settings1" role="tabpanel">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing, Oh, would I could describe these conceptions, could impress upon paper all that is living so full and warm within me, that it might be the.
                                                    <div class="mt-2">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">Read More <i class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
						<!-- end page title -->
						<div class="row mt-2">
							<div class="col">
								<div class="h-100">
									<div class="row">

										<div class="col-sm-12 ">
											<div class="card">
                                                <div class="card-header align-items-center d-flex">

                                                    <h4>Transactions List</h4>

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
														<table class="table table-centered align-middle table-nowrap mb-0" id="listTable">
															<thead class="table-light">
																<tr>
                                                                     <th>S. No</th>
                                                                    {{-- <th>user id</th> --}}
																	<th scope="col">Player Details</th>
                                                                    {{-- <th scope="col">Email</th> --}}
                                                                    <th scope="col">Transaction Type</th>
                                                                    <th scope="col">Payment Type</th>
                                                                    <th scope="col">Deposit Amount</th>
																	<th scope="col">Withdrawal Amount</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
																	{{-- <th scope="col">Updated At</th> --}}

																	<th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
                                                                {{-- {{ dd($requests) }} --}}
															@forelse($requests as $data)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    {{-- <td>{{ $data->user_id}}</td> --}}
																	<td>
                                                                        <a href="{{ route('viewplayer', md5($data->user->id)) }}" title="View Player">
                                                                        <div class="d-flex align-items-center fw-medium">
                                                                            {{-- <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xxs me-2">
                                                                            <div>
                                                                             <p class="mb-0 text-primary ">{{ ucfirst($data->user->name) }}</p>
                                                                            <p class="mb-0 transaction_email text-body">{{ $data->user->email }}</p> --}}
                                                                            {{-- <img src="{{ asset('storage/app/public/' . optional($data->user)->profile_image ?? 'default-avatar.png') }}" alt="" class="avatar-xxs me-2"> --}}
                                                                            @if(!empty($data->user->profile_image) )
                                                                                <img src="{{ asset('storage/app/public/' .$data->user->profile_image) }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                                            @else
                                                                                <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                                            @endif
                                                                            <div>
                                                                                <p class="mb-0 text-primary ">{{ ucfirst(optional($data->user)->name ?? 'Unknown') }}</p>
                                                                                <p class="mb-0 transaction_email text-body">{{ optional($data->user)->email ?? 'No Email' }}</p>
                                                                            </div>

                                                                            {{-- </div> --}}


                                                                        </div>
                                                                        </a>
                                                                    </td>
                                                                     <td>@if($data->transaction_type == 'withdrawal')
                                                                            <span class="text-secondary">Withdrawal</span>
                                                                        @elseif($data->transaction_type == 'deposit')
                                                                            <span class="text-info">Deposit</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($data->transaction_type == 'withdrawal')
                                                                      {{ $data->paymentMethod?->method_name ? ucfirst($data->paymentMethod->method_name) : 'Null' }}

                                                                        @elseif($data->transaction_type == 'deposit')
                                                                        {{ ucfirst($data->deposit_method_id)}}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $data->amount ?? '-' }}</td>
                                                                    <td>{{ $data->withdrawal_amount ?? '-' }}</td>
																	<td>
																	@if($data->status == "pending")
																	<span class="badge badge-outline-warning">Pending</span>
																	@elseif($data->status == "completed")
																	<span class="badge badge-outline-success">Completed</span>
                                                                    @elseif ($data->status == "rejected")
																	<span class="badge badge-outline-danger">Rejected</span>

																	@endif
																	</td>
                                                                    <td>{{ $data->created_at }}</td>
																	<td>
                                                                        @if($data->status == "pending")
																			<a href="{{ route('viewtransaction', md5($data->id)) }}" class="link-info fs-15" title="Approve Transaction">Approve</a>
                                                                            @elseif($data->status == "completed")
																			<a href="" class="link-success disabled fs-15" aria-disabled="true" style="pointer-events: none;" title="">Approved<i class="bi bi-check text-success"></i></a>
                                                                            @elseif ($data->status == "rejected")
																			<a href="" class="link-danger disabled fs-15" aria-disabled="true" style="pointer-events: none;" title="">Rejected</a>

                                                                            @endif
																	</td>
																</tr><!-- end tr -->
															@empty
																{{-- <tr>
																	<td colspan="9">No Records Found</td>
																</tr> --}}
															@endforelse
															</tbody>
														</table>
													</div>
                                                    <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                                                        {{-- <div class="col-sm">
                                                            <div class="text-muted">
                                                                Showing <span class="fw-semibold">{{ $requests->firstItem() }}</span> to
                                                                <span class="fw-semibold">{{ $requests->lastItem() }}</span> of
                                                                <span class="fw-semibold">{{ $requests->total() }}</span> Results
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-auto">

                                                             <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start">
                                                                @if ($requests->onFirstPage())
                                                                    <li class="page-item disabled"><a href="#" class="page-link">←</a></li>
                                                                @else
                                                                    <li class="page-item"><a href="{{ $requests->previousPageUrl() }}" class="page-link">←</a></li>
                                                                @endif

                                                                @foreach ($requests->getUrlRange(1, $requests->lastPage()) as $page => $url)
                                                                    <li class="page-item {{ $page == $requests->currentPage() ? 'active' : '' }}">
                                                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                                                    </li>
                                                                @endforeach

                                                                @if ($requests->hasMorePages())
                                                                    <li class="page-item"><a href="{{ $requests->nextPageUrl() }}" class="page-link">→</a></li>
                                                                @else
                                                                    <li class="page-item disabled"><a href="#" class="page-link">→</a></li>
                                                                @endif
                                                            </ul>


                                                        </div> --}}
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
    $('#listTable').DataTable({
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
