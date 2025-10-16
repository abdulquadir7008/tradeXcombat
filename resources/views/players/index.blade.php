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
                    <div class="container-fluid">
						<!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h2 class="mb-sm-0">Player List</h4>
								<div class="flex-shrink-0">
									<button type="button" class="btn btn-soft-info btn-md mr-2">
										<i class="ri-file-list-3-line align-middle"></i> Export
									</button>

									<a href="{{ route('createplayer') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
                                            <i class="bi bi-plus align-middle"></i> Add New

									</button></a>
								</div>
                            </div>
							<div class="page-title-right mb-2">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Players</a></li>
									<li class="breadcrumb-item active">Player List</li>
								</ol>
							</div>
                        </div>
                    </div>
                    <!-- end page title -->

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
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $data->total() }}">{{ $data->total() }}</span></h4>
													<div class="d-flex align-items-center gap-2">
														<h5 class="text-success fs-12 mb-0">
															<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +18.30 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div>
												</div>
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-success-subtle rounded fs-3">
														<i class="bx bx-dollar-circle text-success"></i>
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

								{{-- <div class="col-xl-4 col-md-4 col-sm-12">
									<!-- card -->
									<div class="card card-animate">
										<div class="card-body">
											<div class="d-flex justify-content-between">
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-info-subtle rounded fs-3">
														<i class="bx bx-shopping-bag text-info"></i>
													</span>
												</div>
												<div class="text-end flex-grow-1">
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Orders</p>
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="698.36">0</span>k </h4>
													<div class="d-flex align-items-center justify-content-end gap-2">
														<h5 class="text-danger fs-12 mb-0">
															<i class="ri-arrow-right-down-line fs-13 align-middle"></i> -2.74 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div>
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
													<p class="text-uppercase fw-medium text-muted text-truncate fs-13">Customers</p>
													<h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="183.35">0</span>M </h4>
													<div class="d-flex align-items-center gap-2">
														<h5 class="text-success fs-12 mb-0">
															<i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
														</h5>
														<p class="text-muted mb-0">than last week</p>
													</div>
												</div>
												<div class="avatar-sm flex-shrink-0">
													<span class="avatar-title bg-warning-subtle rounded fs-3">
														<i class="bx bx-user-circle text-warning"></i>
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
								</div><!-- end col --> --}}
							</div> <!-- end row-->
						</div>
					</div>

                        <div class="row">
                            <div class="col">
                                <div class="h-100">




                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <div class="flex-shrink-0">



														<div class="dropdown card-header-dropdown">
                                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fw-semibold text-uppercase fs-12">Sort by:
                                                                </span><span class="text-muted">Today<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Today</a>
                                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                                <a class="dropdown-item" href="#">Last 7 Days</a>
                                                                <a class="dropdown-item" href="#">Last 30 Days</a>
                                                                <a class="dropdown-item" href="#">This Month</a>
                                                                <a class="dropdown-item" href="#">Last Month</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="d-flex justify-content-sm-end">
                                                            <div class="search-box ms-2">
                                                                <input type="text" class="form-control search" placeholder="Search...">
                                                                <i class="ri-search-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </div><!-- end card header -->
                                                {{-- {{ dd($data->links()) }} --}}

                                                <div class="card-body">
                                                    <div class="table-responsive table-card">
                                                        <table class="table table-centered align-middle table-nowrap mb-0" id="customerTable">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Phone Number</th>
                                                                    <th scope="col">Join Date</th>
                                                                    <th scope="col">Country</th>
                                                                    <th scope="col">Status</th>
																	<th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															@foreach ($data as $key => $user)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                @if($user->profile_image)
                                                                                <img src="{{ asset('storage/app/public/' . $user->profile_image) }}" alt="" class="avatar-xs rounded-circle" />
                                                                                @else
                                                                                <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle" />

                                                                                @endif
                                                                            </div>
                                                                            <div class="flex-grow-1">{{ $user->name }}</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>{{ $user->phone }}</td>
                                                                    <td>{{ date('Y-m-d', strtotime($user->created_at)); }}</td>
																	<td>{{ $user->country }}</td>
                                                                    <td>
                                                                        @if($user->is_active == 1)
                                                                        <span class="badge text-success  bg-success-subtle">Active</span>
                                                                        @else
                                                                        <span class="badge text-danger  bg-danger-subtle">Inactive</span>

                                                                        @endif
                                                                    </td>
																	<td>
																		<a href="{{ route('viewplayer', md5($user->id)) }}" class="link-info fs-15"  title="Click to view player details">
                                                                            <i class="ri-eye-fill"></i>
                                                                        </a>
                                                                        <a href="{{ route('editplayer', md5($user->id)) }}" class="link-success fs-15"  title="Click to edit player details">
                                                                            <i class="ri-edit-2-line"></i>
                                                                        </a>
																	</td>
                                                                </tr><!-- end tr -->
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                                                        <div class="col-sm">
                                                            {{-- <div class="text-muted">
                                                                Showing <span class="fw-semibold">6</span> of <span class="fw-semibold">25</span> Results
                                                            </div> --}}
                                                            <div class="text-muted">
                                                                Showing <span class="fw-semibold">{{ $data->firstItem() }}</span> to
                                                                <span class="fw-semibold">{{ $data->lastItem() }}</span> of
                                                                <span class="fw-semibold">{{ $data->total() }}</span> Results
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-auto">
                                                            {{-- <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start">
                                                            <li class="page-item disabled">
                                                                <a href="#" class="page-link">←</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">1</a>
                                                            </li>
                                                            <li class="page-item active">
                                                                <a href="#" class="page-link">2</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">3</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a href="#" class="page-link">→</a>
                                                            </li>

                                                        </ul> --}}
                                                             <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start">
                                                                {{-- Previous Page Link --}}
                                                                @if ($data->onFirstPage())
                                                                    <li class="page-item disabled"><a href="#" class="page-link">←</a></li>
                                                                @else
                                                                    <li class="page-item"><a href="{{ $data->previousPageUrl() }}" class="page-link">←</a></li>
                                                                @endif

                                                                {{-- Pagination Elements --}}
                                                                @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                                                    <li class="page-item {{ $page == $data->currentPage() ? 'active' : '' }}">
                                                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                                                    </li>
                                                                @endforeach

                                                                {{-- Next Page Link --}}
                                                                @if ($data->hasMorePages())
                                                                    <li class="page-item"><a href="{{ $data->nextPageUrl() }}" class="page-link">→</a></li>
                                                                @else
                                                                    <li class="page-item disabled"><a href="#" class="page-link">→</a></li>
                                                                @endif
                                                            </ul>

                                                           {{-- {{ $data->links() }} --}}

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
<script>
document.querySelector('.search').addEventListener('keyup', function () {
    const term = this.value.toLowerCase();
    const rows = document.querySelectorAll('#customerTable tbody tr');
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(term) ? '' : 'none';
    });
});
</script>

@endsection
