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
                                <h4 class="mb-sm-0">Player Profile</h4>
                                <div class="flex-shrink-0 d-flex gap-2">
									<a href="{{ route('players') }}"><button type="button" class="btn btn-soft-info btn-md mr-2">
										<i class="ri-file-list-3-line align-middle"></i> Back to List
									</button></a>
                                    <form action="{{ route('deleteplayer', md5($user->id)) }}" method="POST" id="deletePlayerForm">
                                        @csrf
                                        {{-- @method('DELETE') If your route expects DELETE --}}
                                        <button type="button" class="btn btn-soft-danger btn-md" id="deletePlayerBtn">
                                            <i class="ri-delete-bin-line align-middle"></i> Delete account
                                        </button>
                                    </form>

                                </div>




                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card overflow-hidden">
                                <div class="rounded profile-basic position-relative" style="background-image: url('{{ asset('assets/images/profile-bg.jpg') }}');background-size: cover;background-position: center;">
                                    <div class="bg-overlay bg-primary"></div>
                                </div>
                                <div class="card-body">
                                    <div class="position-relative">
                                        <div class="mt-n5">
                                             @if($user->profile_image)
                                                <img src="{{ asset('storage/app/public/'. $user->profile_image ) }}" alt="" class="avatar-lg rounded-circle p-1 mt-n3 bg-white">
                                                @else
                                                <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-lg rounded-circle p-1 mt-n3">

                                                @endif
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <div class="row justify-content-between gy-4">
                                            <div class="col-xl-5 col-lg-5">
                                                <h5 class="fs-17">{{ ucfirst($user->name) }}</h5>
                                                <div class="hstack gap-1 mb-3 text-muted">
                                                    <div class="me-2"><i class="ri-map-pin-user-line me-1 fs-16 align-middle"></i>{{ $user->country }}</div>
                                                    <div>
                                                        <i class="bi bi-phone-fill me-1 fs-16 align-middle"></i>{{ $user->phone }}
                                                    </div>
                                                </div>
                                                <p>{{ ucfirst($user->bio) }}</p>

                                                <div class="hstack gap-2">
                                                    {{-- <button type="button" class="btn btn-success custom-toggle" data-bs-toggle="button" aria-pressed="false">
                                                        <span class="icon-on"><i class="ri-user-add-line align-bottom me-1"></i> Connect</span>
                                                        <span class="icon-off"><i class="ri-check-fill align-bottom me-1"></i> Unconnect</span>
                                                    </button> --}}
                                                   @if($user->is_active == 1)
                                                        <button class="btn btn-danger" type="button" id="user-status-deactivate">Deactivate</button>
                                                        <button class="btn btn-warning" type="button" id="user-ban-account">Ban Account</button>
                                                    @elseif($user->is_active == 0)
                                                        <button class="btn btn-success" type="button" id="user-status">Activate</button>
                                                        <button class="btn btn-warning" type="button" id="user-ban-account">Ban Account</button>
                                                    @elseif($user->is_active == 2)
                                                        <button class="btn btn-success" type="button" id="user-unban">Unban Account</button>
                                                    @endif

                                                    {{-- @if($user->is_active == 1)
                                                        <button class="btn btn-danger"  type="button" id="user-status-deactivate">Deacivate</button>
                                                    @else
                                                        <button class="btn btn-success" type="button" id="user-status">Activate</button>

                                                    @endif --}}


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-2 mt-lg-4 gy-3">
                                        <div class="col-lg order-1">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills animation-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#profile-tab" role="tab">
                                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#transactions" role="tab">
                                                    <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Transactions</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                                    <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Combat</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#referrals" role="tab">
                                                    <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Referrals</span>
                                                </a>
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="col-lg-auto order-lg-2">
                                            <a href="{{ route('editplayer', md5($user->id)) }}" class="btn btn-secondary"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>

                    @include('players.profile_tabs')
</div>
<script>
    const userActivate = document.getElementById("user-status");

    if (userActivate) {
        userActivate.addEventListener("click", function () {
            Swal.fire({
                title: "Activate User?",
                text: "Are you sure you want to Activate this user?",
                icon: "question",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Activate",
                cancelButtonText: "Cancel",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger w-xs mt-2",
                    cancelButton: "btn btn-secondary ms-2 mt-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/activate_player/{{ $user->id }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: '{{ $user->id }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Something went wrong. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            // console.error(xhr.responseText);
                        }
                    });
                }
            });
        });


    }
    const userDeactivate = document.getElementById("user-status-deactivate");
    if (userDeactivate) {
        userDeactivate.addEventListener("click", function () {
            Swal.fire({
                title: "Deactivate User?",
                text: "Are you sure you want to Deactivate this user?",
                icon: "question",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Deactivate",
                cancelButtonText: "Cancel",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger w-xs mt-2",
                    cancelButton: "btn btn-secondary ms-2 mt-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/deactivate_player/{{ $user->id }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: '{{ $user->id }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                           }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Something went wrong. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            // console.error(xhr.responseText);
                        }
                    });
                }
            });
        });


    }

     document.getElementById('deletePlayerBtn').addEventListener('click', function (e) {
        const form = this.closest('form');

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
                    // text: "Your account is safe.",
                    // icon: "info",
                    customClass: {
                        confirmButton: "btn btn-secondary mt-2"
                    },
                    buttonsStyling: false
                });
            }
        });
    });
    document.getElementById("user-ban-account").addEventListener('click', function (e) {
         Swal.fire({
                title: "Ban User?",
                text: "Are you sure you want to Ban this user?",
                // icon: "question",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Yes, Ban",
                cancelButtonText: "Cancel",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger w-xs mt-2",
                    cancelButton: "btn btn-secondary ms-2 mt-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/ban_player',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: '{{ $user->id }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                           }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Something went wrong. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
    });
</script>

@endsection



