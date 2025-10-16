@extends('layouts.app')

<style>
    .profile-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px 40px;
        text-align: center;
        width: 300px;
        color: white;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        transition: 0.3s ease-in-out;
    }

    .profile-card:hover {
        transform: translateY(-10px);
    }

    .profile-image {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 15px;
        cursor: pointer;
    }

    .profile-image img,
    .profile-image .placeholder {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        /* border: 3px solid white; */
        object-fit: cover;
        background-color: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
    }

    .profile-image input[type="file"] {
        display: none;
    }

    .social-icons {
        margin-top: 15px;
    }

    .social-icons a {
        color: white;
        margin: 0 8px;
        font-size: 18px;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: #ddd;
    }
    .placeholder p{
        font-size: 13px;
    }
    .choices__inner{
        background-color: black !important;
    }
    .image-wrapper {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    background-color: rgba(255, 255, 255, 0.1);
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.preview-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}

.placeholder {
    font-size: 26px;
    color: #fff;
    text-align: center;
    z-index: 1;
}

</style>



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
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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
									<a href="{{ route('staffList') }}"><button type="button" class="btn btn-soft-info btn-md mr-2">
										<i class="ri-file-list-3-line align-middle"></i> Back to List
									</button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                {{-- <form class="needs-validation" method="post" action="{{ route('createStaff') }}" novalidate enctype="multipart/form-data">
                                                    @csrf

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card card-body profile-card text-center">
                                <label class="profile-image">
                                    <div class="image-wrapper">
                                        <div id="imagePlaceholder" class="placeholder ">📷<br></div>
                                        <img id="previewImg" src="" alt="User" class="preview-image" style="display: none;" >

                                    </div>
                                        <p class="m-0">Upload Photo</p>

                                    <input type="file" id="fileInput" name="profile_image" accept="image/*" required onchange="previewImage(event)">
                                        <div class="invalid-feedback">Please upload a photo.</div>

                                </label>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card">

                                <div class="card-body form-steps">



                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel" aria-labelledby="pills-gen-info-tab">


                                                    <div class="row g-3">

                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="validationRoleName" class="form-label">Name</label>
                                                                <input type="text" class="form-control" name="name" id="validationRoleName"
                                                                    placeholder="Enter name" required value="{{ old('name') }}">
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback">Please enter a name.</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="validationRoleDesc" class="form-label">Email</label>
                                                                <input class="form-control" name="email" type="email" id="validationRoleDesc"
                                                                    placeholder="Enter email" required value="{{ old('email') }}">
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback">Please enter an email.</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="validationPassword" class="form-label">Password</label>
                                                                <input type="password" class="form-control" name="password" id="validationPassword"
                                                                    placeholder="Enter password" required>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback">Please enter a password.</div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="validationPhone" class="form-label">Phone</label>
                                                                <input type="text" class="form-control" name="phone" id="validationPhone"
                                                                    placeholder="Enter phone number" required value="{{ old('phone') }}">
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback">Please enter phone number.</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="inputCountry" class="form-label">Country</label>
                                                                <select name="country" id="inputCountry"
                                                                    class="form-select @error('country') is-invalid @enderror"
                                                                    data-choices data-choices-sorting="true">
                                                                    <option selected disabled>Choose...</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->country_name }}"
                                                                            {{ old('country') == $country->country_name ? 'selected' : '' }}>
                                                                            {{ $country->country_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('country')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="inputRole" class="form-label">User Role</label>
                                                                <select name="userrole" id="inputRole"
                                                                    class="form-select @error('userrole') is-invalid @enderror"
                                                                    data-choices data-choices-sorting="true" required>
                                                                    <option selected disabled>Choose a role...</option>
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}"
                                                                            {{ old('userrole') == $role->id ? 'selected' : '' }}>
                                                                            {{ ucfirst($role->name) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('userrole')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>



                                                        <div class="col-xl-6">
                                                            <div>
                                                                <label for="validationRoleStatus" class="form-label">Status</label>
                                                                <select class="form-select" id="validationRoleStatus" name="is_active" required>
                                                                    <option value="">-- Select Status --</option>
                                                                    <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                                                                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                                                                </select>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback">Please select a status.</div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="" value="">

                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </form> --}}
                <form class="needs-validation" method="POST"
                    action="{{ isset($staff) ? route('updateStaff', md5($staff->id)) : route('createStaff') }}"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @if(isset($staff))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <!-- Profile Image -->
                        <div class="col-xl-4">
                            <div class="card card-body profile-card text-center">
                                <label class="profile-image">
                                    <div class="image-wrapper">
                                        <div id="imagePlaceholder" class="placeholder" style="{{ isset($staff) && $staff->profile_image ? 'display:none;' : '' }}">
                                            📷<br>
                                        </div>
                                        <img id="previewImg"
                                            src="{{ isset($staff) && $staff->profile_image ? asset('storage/app/public/' . $staff->profile_image) : '' }}"
                                            alt="User"
                                            class="preview-image"
                                            style="{{ isset($staff) && $staff->profile_image ? 'display:block;' : 'display:none;' }}">
                                    </div>
                                    <p class="m-0">Upload Photo</p>
                                    <input type="file" id="fileInput" name="profile_image" accept="image/*"
                                        onchange="previewImage(event)" {{ isset($staff) ? '' : 'required' }}>
                                    <div class="invalid-feedback">Please upload a photo.</div>
                                </label>
                            </div>
                        </div>

                        <!-- Form Info -->
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body form-steps">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active">
                                            <div class="row g-3">
                                                <!-- Name -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" required
                                                        value="{{ old('name', $staff->name ?? '') }}" placeholder="Enter name">
                                                    <div class="invalid-feedback">Please enter a name.</div>
                                                </div>

                                                <!-- Email -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" required
                                                        value="{{ old('email', $staff->email ?? '') }}" placeholder="Enter email">
                                                    <div class="invalid-feedback">Please enter an email.</div>
                                                </div>

                                                <!-- Password -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        {{ isset($staff) ? '' : 'required' }} placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                                    <div class="invalid-feedback">Please enter a password.</div>
                                                </div>

                                                <!-- Phone -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" required
                                                        value="{{ old('phone', $staff->phone ?? '') }}" placeholder="Enter phone number">
                                                    <div class="invalid-feedback">Please enter phone number.</div>
                                                </div>

                                                <!-- Country -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">Country</label>
                                                    <select name="country" class="form-select" required>
                                                        <option disabled selected>Choose...</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->country_name }}"
                                                                {{ old('country', $staff->country ?? '') == $country->country_name ? 'selected' : '' }}>
                                                                {{ $country->country_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a country.</div>
                                                </div>

                                                <!-- Role -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">User Role</label>
                                                    <select name="userrole" class="form-select" required>
                                                        <option disabled selected>Choose a role...</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                {{ old('userrole', $staff->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                                                {{ ucfirst($role->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a role.</div>
                                                </div>

                                                <!-- Status -->
                                                <div class="col-xl-6">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select" name="is_active" required>
                                                        <option value="" disabled >-- Select Status --</option>
                                                        <option value="1" {{ old('is_active', $staff->is_active ?? '') == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('is_active', $staff->is_active ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a status.</div>
                                                </div>

                                                <!-- Buttons -->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ isset($staff) ? 'Update' : 'Submit' }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </div> <!-- .row -->
                                        </div>
                                    </div>
                                </div> <!-- .card-body -->
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    // function previewImage(event) {
    //     const file = event.target.files[0];
    //     if (file) {
    //         const reader = new FileReader();
    //         reader.onload = function () {
    //             const previewImg = document.getElementById('previewImg');
    //             const placeholder = document.getElementById('imagePlaceholder');
    //             previewImg.src = reader.result;
    //             previewImg.style.display = 'block';
    //             placeholder.style.display = 'none';
    //         };
    //         reader.readAsDataURL(file);
    //     }
    // }
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function () {
            const dataURL = reader.result;
            document.getElementById('previewImg').src = dataURL;
            document.getElementById('previewImg').style.display = 'block';
            document.getElementById('imagePlaceholder').style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
    document.addEventListener('DOMContentLoaded', function () {
        const permissionSelect = document.getElementById('permissionSelect');
        if (permissionSelect) {
            new Choices(permissionSelect, {
                removeItemButton: true,
                shouldSort: true,
                placeholderValue: 'Select permissions',
                searchEnabled: true,
            });
        }
    });
</script>


@endsection
