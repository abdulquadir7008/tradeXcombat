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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Create Player</h4>
                            <div class="flex-shrink-0">
                                <a href="{{ route('players') }}">
                                    <button type="button" class="btn btn-soft-info btn-md">
                                        <i class="ri-file-list-3-line align-middle"></i> Back to List
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Add New Player</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('storeuser') }}" class="row g-3" method="post" enctype="multipart/form-data">
                                    @csrf

                                    {{-- Name --}}
                                    <div class="col-md-6">
                                        <label for="fullnameInput" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                            id="fullnameInput" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6">
                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                            id="phonenumberInput" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                            id="inputEmail4" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="position-relative">
                                            <input type="password" name="password"
                                                class="form-control pe-5 @error('password') is-invalid @enderror"
                                                id="password" placeholder="Enter a password"
                                                value="{{ old('password') }}">
                                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                                style="cursor: pointer;" id="togglePassword">
                                                <i class="ri-eye-off-line" id="passwordIcon"></i>
                                            </span>
                                            @error('password')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>




                                    {{-- Birth Date --}}
                                    <div class="col-md-12">
                                        <label for="StartleaveDate" class="form-label">Date of Birth</label>
                                        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror"
                                            id="StartleaveDate" value="{{ old('birth_date') }}">
                                        @error('birth_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Bio --}}
                                    <div class="col-12">
                                        <label for="VertimeassageInput" class="form-label">Bio</label>
                                        <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                                                id="VertimeassageInput" rows="3" placeholder="Enter your message" required>{{ old('bio') }}</textarea>
                                        @error('bio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Country --}}
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Country</label>
                                        <select name="country" id="inputState"
                                            class="form-select @error('country') is-invalid @enderror" data-choices data-choices-sorting="true">
                                            <option selected disabled>Choose...</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->country_name }}" {{ old('country') == $country->country_name ? 'selected' : '' }}>
                                                    {{ $country->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Profile Image --}}
                                    <div class="col-md-6">
                                        <label for="validationCustom06" class="form-label">Profile Image</label>
                                        <input type="file" name="profile_image"
                                            class="form-control @error('profile_image') is-invalid @enderror"
                                            id="validationCustom06" required>
                                        @error('profile_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_active" class="form-label">Status</label>
                                        <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- Submit --}}
                                    <div class="col-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');
        const isPassword = passwordInput.getAttribute('type') === 'password';

        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        passwordIcon.classList.toggle('ri-eye-line', isPassword);
        passwordIcon.classList.toggle('ri-eye-off-line', !isPassword);
    });
</script>


@endsection
