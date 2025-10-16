@extends('layouts.app')

@section('content')
<div id="layout-wrapper">
	@include('partials.topheader')
	@include('partials.header')
	@include('partials.sidebar')

    <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Withdrawal Request Details</h4>

                                {{-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Wizard</li>
                                    </ol>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-6">
                                    <div class="card card-body">
                                        <div class="d-flex mb-4 align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('storage/app/public/' . $request->user->profile_image) }}" alt="" class="avatar-sm rounded-circle" />
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

                                    <h4 class="card-title mb-0">Details</h4>
                                    <div class="d-flex justify-content-end">
                                        @if($request->withdrawal_status == "completed")
                                        <span class="badge bg-success">{{ ucfirst($request->withdrawal_status) }}</span>
                                        @else
                                        <span class="badge bg-warning">{{ ucfirst($request->withdrawal_status) }}</span>

                                        @endif
                                    </div>

                                </div><!-- end card header -->
                                <div class="card-body form-steps">
                                    <form action="#">
                                        <div class="text-center pt-3 pb-3 mb-1">
                                            <h5>Signup Your Account</h5>
                                        </div>


                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel" aria-labelledby="pills-gen-info-tab">
                                                {{-- <div>
                                                    <div class="mb-4">
                                                        <div class="d-flex justify-content-end">
                                                            <h5 class="mb-1">General Information</h5>
                                                            <p class="text-muted">Fill all Information as below</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-email-input">Email</label>
                                                                <input type="text" class="form-control" id="gen-info-email-input" placeholder="Enter Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-username-input">User Name</label>
                                                                <input type="text" class="form-control" id="gen-info-username-input" placeholder="Enter User Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="gen-info-password-input">Password</label>
                                                        <input type="password" class="form-control" id="gen-info-password-input" placeholder="Enter Password">
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Contact</h5>
                                                        <p><i class="bx bxs-phone"></i>{!! " ". $request->user->phone!!}</p>
                                                        <h5>Requested On</h5>
                                                        <p><i class=" bx bx-calendar"></i>{!! " ". $request->created_at!!}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5>Contact</h5>
                                                        <p><i class="bx bxs-phone"></i>{!! " ". $request->user->phone!!}</p>
                                                        <h5>Requested On</h5>
                                                        <p><i class=" bx bx-calendar"></i>{!! " ". $request->created_at!!}</p>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-start gap-3 mt-4">
                                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Go to more info</button>
                                                </div>
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
@endsection
