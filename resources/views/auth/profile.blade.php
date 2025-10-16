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
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card overflow-hidden profile-setting-img">
                                <div class="profile-user rounded profile-basic" style="background-image: url('assets/images/profile-bg.jpg');background-size: cover;background-position: center;">
                                    <div class="bg-overlay bg-primary"></div>
                                    {{-- <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input d-none">
                                        <label for="profile-foreground-img-file-input" class="btn btn-light">
                                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                        </label>
                                    </div> --}}
                                </div>

                                <div class="card-body">
                                    <div class="position-relative mb-3">
                                        <div class="mt-n5">

                                           <img src="{{ $user->profile_image ? asset('storage/app/public/' . $user->profile_image) : asset('assets/images/users/user-dummy-img.jpg') }}"
                                                 alt="" class="avatar-lg rounded-circle p-1 mt-n4">

                                        </div>
                                    </div>
                                    <div class="row justify-content-between gy-4">
                                        <div class="col-xl-3 col-lg-5">
                                            <div class="border border-dashed p-3 rounded-3">
                                                <div class="d-flex align-items-center mb-4 pb-1">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">{{ $user->name }}</h5>
                                                        <p class="card-title text-muted mb-0">{{ $user->email }}</p>

                                                    </div>
                                                    {{-- <div class="flex-shrink-0">
                                                        <a href="javascript:void(0);" class="badge bg-light text-secondary"><i class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                                                    </div> --}}
                                                </div>
                                                {{-- <div class="progress animated-progress custom-progress progress-label">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="label">30%</div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="border border-dashed p-3 rounded-3 mt-4">
                                                <div class="d-flex align-items-center mb-3 pb-1">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">Skills</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <a href="javascript:void(0);" class="badge bg-light text-secondary"><i class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2 fs-15">
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">Photoshop</a>
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">illustrator</a>
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">HTML</a>
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">CSS</a>
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">Javascript</a>
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">Php</a>
                                                    <a href="javascript:void(0);" class="badge text-info bg-info-subtle">Python</a>
                                                </div>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="col-xl-3 col-lg-5">
                                            <div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">Portfolio</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i class="ri-add-fill align-bottom me-1"></i> Add</a>
                                                    </div>
                                                </div>
                                                <div class="mb-3 d-flex">
                                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                        <span class="avatar-title rounded-circle fs-16 bg-dark text-white">
                                                            <i class="ri-github-fill"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="gitUsername" placeholder="Username" value="@edwarddiana">
                                                </div>
                                                <div class="mb-3 d-flex">
                                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                        <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                            <i class="ri-global-fill"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com" value="www.themesbrand.com">
                                                </div>
                                                <div class="mb-3 d-flex">
                                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                        <span class="avatar-title rounded-circle fs-16 bg-success">
                                                            <i class="ri-dribbble-fill"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="dribbleName" placeholder="Username" value="@edward_diana">
                                                </div>
                                                <div class="d-flex">
                                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                        <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                            <i class="ri-pinterest-fill"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="pinterestName" placeholder="Username" value="Edward Diana">
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Nav tabs -->
                                    <div class="row align-items-center mt-3 gy-3">
                                        <div class="col-md order-1">
                                        <ul class="nav nav-pills animation-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Personal Details</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false" tabindex="-1">
                                                    <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Changes Password</span>
                                                </a>
                                            </li>

                                        </ul>
                                        </div>
                                        <div class="col-md-auto order-md-2">
                                        {{-- <div class="flex-shrink-0">
                                            <a href="pages-profile-settings.html" class="btn btn-secondary"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--end col-->
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            <form action="{{ route('profileupdate') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name" id="firstnameInput" placeholder="Enter your firstname" value="{{ $user->name }}">
                                                        </div>
                                                    </div>

                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" name="phone" id="phonenumberInput" placeholder="Enter your phone number" value="{{  $user->phone  }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="emailInput" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" name="email" id="emailInput" placeholder="Enter your email" value="{{ $user->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="emailInput" class="form-label">Profile Picture</label>
                                                            <input type="file" class="form-control" name="profile_image" id="emailInput" placeholder="Enter your email" >
                                                        </div>
                                                        {{-- @if(isset($user->profile_image))
															<div class="d-flex align-items-center">
																<div class="flex-shrink-0 me-2">
																	<img src="{{ asset('storage/app/public/' . $user->profile_image) }}" alt="" class="avatar-xs rounded-circle" />
																</div>
															</div>
															@endif --}}

                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            {{-- <button type="button" class="btn btn-soft-success">Cancel</button> --}}
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <!--end tab-pane-->
                                        <div class="tab-pane" id="changePassword" role="tabpanel">
                                            <form action="{{  route('changepassword') }}" method="post">
                                                @csrf
                                                <div class="row g-2 justify-content-lg-between align-items-center">
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="oldpasswordInput" class="form-label">Old Password*</label>
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control" name="old_password" id="oldpasswordInput" placeholder="Enter current password">
                                                                {{-- <button class="btn btn-link position-absolute top-0 end-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button> --}}
                                                                <button type="button" class="btn btn-link position-absolute top-0 end-0 text-decoration-none text-muted password-toggle " data-target="#oldpasswordInput">
                                                                    <i class="ri-eye-fill align-middle"></i>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="auth-pass-inputgroup">
                                                            <label for="password-input" class="form-label">New Password*</label>
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control password-input" name="password" id="password-input" onpaste="return false" placeholder="Enter new password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                                {{-- <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button> --}}
                                                                <button type="button" class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-toggle" data-target="#password-input">
                                                                    <i class="ri-eye-fill align-middle"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="auth-pass-inputgroup">
                                                            <label for="confirm-password-input" class="form-label">Confirm Password*</label>
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control password-input" name="password_confirmation" onpaste="return false" id="confirm-password-input" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                                {{-- <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button> --}}
                                                                <button type="button" class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-toggle" data-target="#confirm-password-input">
                                                                    <i class="ri-eye-fill align-middle"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            {{-- <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a> --}}
                                                            <div class="">

                                                                <button type="submit" class="btn btn-success">Change Password</button>
                                                            </div>
                                                        </div>

                                                    <!--end col-->

                                                    <div class="col-lg-12">
                                                        <div class="card bg-light passwd-bg" id="password-contain">
                                                            <div class="card-body">
                                                                <div class="mb-4">
                                                                    <h5 class="fs-13">Password must contain:</h5>
                                                                </div>
                                                                <div class="">
                                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </form>
                                            {{-- <div class="mt-4 mb-4 pb-3 border-bottom d-flex justify-content-between align-items-center">
                                                <h5 class="card-title">Login History</h5>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="btn btn-secondary">All Logout</a>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">Mobile</th>
                                                                    <th scope="col">IP Address</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Address</th>
                                                                    <th scope="col"><i class="ri-logout-box-r-line"></i></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><i class="ri-smartphone-line me-2"></i>iPhone 12 Pro</td>
                                                                    <td>192.44.234.160</td>
                                                                    <td>12/12/2022</td>
                                                                    <td>Los Angeles, United States</td>
                                                                    <td><a href="#">Logout</a></td>

                                                                </tr>

                                                                <tr>
                                                                    <td><i class="ri-tablet-line me-2"></i>Apple iPad Pro</td>
                                                                    <td>192.44.234.162</td>
                                                                    <td>9/01/2022</td>
                                                                    <td>Phoenix, United States</td>
                                                                    <td><a href="#">Logout</a></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><i class="ri-smartphone-line me-2"></i>Galaxy S21 Ultra 5G</td>
                                                                    <td>192.45.234.160</td>
                                                                    <td>25/02/2022</td>
                                                                    <td>Washington, United States</td>
                                                                    <td><a href="#">Logout</a></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><i class="ri-macbook-line me-2"></i>Dell Inspiron 14</td>
                                                                    <td>192.40.234.160</td>
                                                                    <td>16/09/2022</td>
                                                                    <td>Phoenix, United States</td>
                                                                    <td><a href="#">Logout</a></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><i class="ri-smartphone-line me-2"></i>iPhone 12 Pro</td>
                                                                    <td>192.44.236.160</td>
                                                                    <td>22/01/2022</td>
                                                                    <td>Conneticut, United States</td>
                                                                    <td><a href="#">Logout</a></td>

                                                                </tr>

                                                                <tr>
                                                                    <td><i class="ri-tablet-line me-2"></i>Apple iPad Pro</td>
                                                                    <td>190.44.234.160</td>
                                                                    <td>19/06/2022</td>
                                                                    <td>Los Angeles, United States</td>
                                                                    <td><a href="#">Logout</a></td>

                                                                </tr>

                                                                <tr>
                                                                    <td><i class="ri-smartphone-line me-2"></i>Galaxy S21 Ultra 5G</td>
                                                                    <td>194.44.235.160</td>
                                                                    <td>30/08/2022</td>
                                                                    <td>Conneticut, United States</td>
                                                                    <td><a href="#">Logout</a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div><!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Hybrix.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
</div>
<script>
    document.querySelectorAll('.password-toggle').forEach(function (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('data-target'));
            const icon = this.querySelector('i');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('ri-eye-fill');
                icon.classList.add('ri-eye-off-fill');
            } else {
                input.type = "password";
                icon.classList.remove('ri-eye-off-fill');
                icon.classList.add('ri-eye-fill');
            }
        });
    });
</script>

@endsection
