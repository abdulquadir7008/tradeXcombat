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
                                <h4 class="mb-sm-0">Transaction Details</h4>

                                {{-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Wizard</li>
                                    </ol>
                                </div> --}}
                                <div class="flex-shrink-0">
									<a href="{{ route('transactions') }}"><button type="button" class="btn btn-soft-info btn-md mr-2">
										<i class="ri-file-list-3-line align-middle"></i> Back to List
									</button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-6">
                                    <div class="card card-body">
                                        <div class="d-flex mb-4 align-items-center">
                                            <div class="flex-shrink-0">
                                                {{-- <img src="{{ asset('storage/app/public/' . $request->user->profile_image) }}" alt="" class="avatar-sm rounded-circle" /> --}}
                                                 @if(!empty($data->user->profile_image) && Storage::disk('public')->exists($data->user->profile_image))
                                                <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-sm rounded-circle">
                                                @else
                                                <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-sm rounded-circle" />
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title mb-1">{{ ucfirst($request->user->name) }}</h5>
                                                <p class="text-muted mb-0">{{ $request->user->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2">
                                             <p class="card-text text-muted">Wallet Balance - </p>

                                            <h6 class="mb-1">${{ $wallet_balance }}</h6>
                                        </div>

                                        <a href="{{ route('viewplayer', md5($request->user->id)) }}" class="btn btn-primary btn-sm">View User</a>
                                    </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">

                                    <h4 class="card-title mb-0">Transaction Details</h4>
                                    <div class="d-flex justify-content-end">
                                        @if($request->status == "completed")
                                        <span class="badge badge-outline-success">{{ ucfirst($request->status) }}</span>
                                        @elseif($request->status == "pending")
                                        <span class="badge badge-outline-warning">{{ ucfirst($request->status) }}</span>
                                        @else
                                        <span class="badge badge-outline-danger">{{ ucfirst($request->status) }}</span>

                                        @endif
                                    </div>

                                </div><!-- end card header -->
                                <div class="card-body form-steps">
                                    <form action="#">
                                        {{-- <div class="text-center pt-3 pb-3 mb-1">
                                            <h5>Player Information</h5>
                                        </div> --}}


                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel" aria-labelledby="pills-gen-info-tab">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Contact</strong></span>
                                                            <span> {{ $request->user->phone }}</span>
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Email</strong></span>
                                                            <span> {{ $request->user->email }}</span>
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Player Status</strong></span>
                                                            <span>
                                                                {{-- {{ $request->user->email }} --}}
                                                                @if($request->user->is_active == 1)
                                                                    <span class="badge bg-success">Active</span>
                                                                @elseif($request->user->is_active == 0)
                                                                    <span class="badge bg-danger ">Inactive</span>
                                                                @elseif($request->user->is_active == 2)
                                                                    <span class="badge bg-warning">Banned</span>

                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Transaction ID</strong></span>
                                                            <span> TXN 123</span>
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Wallet balance</strong></span>
                                                            <span>$ {{ $wallet_balance }}</span>
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            @if($request->transaction_type == 'withdrawal')
                                                            <span><strong>Withdrawal Amount</strong></span>
                                                            <span>$ {{ $request->withdrawal_amount }}</span>
                                                            @elseif ($request->transaction_type == 'deposit')
                                                            <span><strong>Deposit Amount</strong></span>
                                                            <span>$ {{ $request->amount }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Payment Method</strong></span>
                                                             @if($request->transaction_type == 'withdrawal')
                                                            <span>{{ $request->paymentMethod->method_name }}</span>
                                                            @elseif ($request->transaction_type == 'deposit')
                                                            <span>{{ $request->deposit_method_id }}</span>
                                                            @endif

                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <span><strong>Requested On</strong></span>
                                                            <span> {{ $request->created_at }}</span>
                                                        </div>
                                                        <!-- Add more key-value pairs like this -->
                                                    </div>
                                                </div>

                                                @if($request->status == "pending")
                                               <div class="d-flex flex-row justify-content-center align-items-center mt-4 gap-3">

                                                <button type="button"
                                                        class="btn btn-info btn-label right nexttab btn-approve"
                                                        data-url="{{ route('approveTransaction', md5($request->id)) }}">
                                                    <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Approve
                                                </button>
                                               <button type="button"
                                                        class="btn btn-danger btn-label right nexttab btn-reject"
                                                        data-url="{{ route('rejectTransaction', md5($request->id)) }}">
                                                    <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Reject
                                                </button>
                                               </div>
                                               @endif

                                            </div>
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade" id="pills-info-desc" role="tabpanel" aria-labelledby="pills-info-desc-tab">
                                                <div>
                                                    <div class="text-center">
                                                        <div class="profile-user position-relative d-inline-block mx-auto mb-2">
                                                            <img src="assets/images/users/user-dummy-img.jpg" class="rounded-circle avatar-lg img-thumbnail user-profile-image" alt="user-profile-image">
                                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                                <input id="profile-img-file-input" type="file" class="profile-img-file-input" accept="image/png, image/jpeg">
                                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                                        <i class="ri-camera-fill"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <h5 class="fs-14">Add Image</h5>

                                                    </div>
                                                    <div>
                                                        <label class="form-label" for="gen-info-description-input">Description</label>
                                                        <textarea class="form-control" placeholder="Enter Description" id="gen-info-description-input" rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-link text-decoration-none btn-label previestab" data-previous="pills-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to General</button>
                                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-success-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->

                                            <div class="tab-pane fade" id="pills-success" role="tabpanel" aria-labelledby="pills-success-tab">
                                                <div>
                                                    <div class="text-center">

                                                        <div class="mb-4">
                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                        </div>
                                                        <h5>Well Done !</h5>
                                                        <p class="text-muted">You have Successfully Signed Up</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </form>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->


                        <!-- end col -->
                    </div><!-- end row -->
                </div>
            </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const approveBtn = document.querySelector('.btn-approve');

        approveBtn.addEventListener('click', function () {
            const redirectUrl = approveBtn.getAttribute('data-url');

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to approve this Transaction?",
                // icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, approve it!",
                cancelButtonText: "No, cancel!",
                customClass: {
                    confirmButton: "btn btn-info w-xs me-2 mt-2",
                    cancelButton: "btn btn-danger w-xs mt-2"
                },
                buttonsStyling: false,
                showCloseButton: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    // Redirect to the approval route
                    window.location.href = redirectUrl;
                }
            });
        });
        document.querySelector('.btn-reject')?.addEventListener('click', function () {
            const url = this.getAttribute('data-url');

            Swal.fire({
                title: "Are you sure?",
                text: "This will Reject this Transaction!",
                // icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, reject it!",
                cancelButtonText: "Cancel",
                customClass: {
                    confirmButton: "btn btn-danger w-xs me-2 mt-2",
                    cancelButton: "btn btn-secondary w-xs mt-2"
                },
                buttonsStyling: false,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>


@endsection
