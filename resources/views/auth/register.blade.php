@extends('layouts.app')

@section('content')
<section class="min-vh-100 p-4 d-flex align-items-center justify-content-center">
	<div class="bg-overlay"></div>
	<div class="container-fluid px-0">
		<div class="row g-0">
			<div class="col-xl-8 col-lg-6" >
				<div class="h-100 mb-0 p-4 d-flex flex-column justify-content-between" style="background-image: url({{ asset('public/assets/images/tradexcombatlog2.png') }}); background-size: cover;
            background-position: center; ">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<img src="{{ asset('public/assets/images/Logo-2.png') }}" alt="" height="32" />
						</div>
					</div>

				</div>
			</div>
			<!--end col-->
			<div class="col-xl-4 col-lg-6">
				<div class="card mb-0 py-4">

					<div class="card-body p-4 p-sm-5 m-lg-2">
						<div class="text-center mt-2">
							<h5 class="text-primary fs-20">Create New Account</h5>
							<p class="text-muted">We've sent a 6-digit code to your email. Please enter it below to verify.</p>
						</div>
						<div class="p-2 mt-5">
							<form class="needs-validation" novalidate action="{{ route('register') }}" method="POST" >
								@csrf
								<div class="mb-3">
									<input type="text" class="form-control" name="name" value="{{ old('name') }}" id="username" placeholder="Name" required autofocus>
									<div class="invalid-feedback">
										Please enter username
									</div>
								</div>
								<div class="mb-3">
									<input type="email" class="form-control" id="useremail" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
									<div class="invalid-feedback">
										Please enter email
									</div>
								</div>
								<div class="mb-3">
									<input type="text" class="form-control" id="useremail" placeholder="Phone Number" required>
									<div class="invalid-feedback">
										Please enter Phone Number
									</div>
								</div>


								<div class="mb-3">
									<div class="position-relative auth-pass-inputgroup">
										<input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required name="password">
										<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
										<div class="invalid-feedback">
											Please enter password
										</div>
									</div>
								</div>

								<div class="mb-3">
									<div class="position-relative auth-pass-inputgroup">
										<input type="password" class="form-control pe-5 conpassword-input" onpaste="return false" placeholder="Confirm Password" id="conpassword-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required name="password_confirmation">
										<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted conpassword-addon" type="button" id="conpassword-addon"><i class="ri-eye-fill align-middle"></i></button>
										<div class="invalid-feedback">
											Please enter password
										</div>
									</div>
								</div>

								<div class="mb-4">
									<p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the TradexCombat <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
								</div>

								<div id="password-contain" class="p-3 bg-light mb-2 rounded">
									<h5 class="fs-13">Password must contain:</h5>
									<p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
									<p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
									<p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
									<p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
								</div>

								<div class="mt-4">
									<button class="btn btn-primary w-100" type="submit">{{ __('Register') }}</button>
								</div>
							</form>
						</div>
						<div class="mt-4 text-center">
							<p class="mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Sign In </a> </p>
						</div>
					</div>
					<!-- end card body -->
				</div>
				<!-- end card -->
			</div>
			<!--end col-->
		</div>
		<!--end row-->
	</div>
	<!--end conatiner-->
</section>
@endsection
