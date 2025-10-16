@extends('layouts.app')

@section('content')
<d id="layout-wrapper">
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
									<h2 class="mb-sm-0">Withdrawal Requests</h4>
                                         @if(isset($usdtedit) && !empty($usdtedit))
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('usdtAccounts') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
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

										<div class="col-sm-12 ">
											<div class="card">
                                                <div class="card-header align-items-center d-flex">

                                                    <div class="col-sm">
                                                        <div class="d-flex justify-content-sm-end">
                                                            <div class="search-box ms-2">
                                                                <input type="text" class="form-control search" placeholder="Search...">
                                                                <i class="ri-search-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </div>
												<div class="card-body">

													<div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="currencyTable">
															<thead class="table-light">
																<tr>
                                                                    <th>user id</th>
																	<th scope="col">Name</th>
                                                                    <th scope="col">Email</th>
																	<th scope="col">Withdrawal Amount</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
																	{{-- <th scope="col">Updated At</th> --}}

																	<th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($requests as $data)
																<tr>
                                                                    <td>{{ $data->user_id}}</td>
																	<td>{{ $data->user->name }}</td>
																	<td>{{ $data->user->email }}</td>

                                                                    <td>{{ $data->withdrawal_amount }}</td>


																	<td>
																	@if($data->status == "pending")
																	<span class="badge   bg-warning">Pending</span>
																	@else
																	<span class="badge bg-success">Completed</span>
																	@endif
																	</td>
                                                                    <td>{{ $data->created_at }}</td>
																	<td>
																			<a href="{{ route('viewrequest', $data->id) }}" class="link-success fs-15" title=""><i class="ri-edit-2-line"></i>View</a>
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
                                                    <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                                                        <div class="col-sm">
                                                            {{-- <div class="text-muted">
                                                                Showing <span class="fw-semibold">6</span> of <span class="fw-semibold">25</span> Results
                                                            </div> --}}
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


                                                        </div>
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
@endsection
