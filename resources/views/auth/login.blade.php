@extends('layouts.app')
{{-- @section('styles') --}}
<style>
    .login-bg-img {
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    margin: 0;
    padding: 0;
    background-image: url({{ asset('assets/images/tradexcombatlog2.png') }});
    }
    body{
        background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    margin: 0;
    padding: 0;
    background-image: url({{ asset('assets/images/login-body-bg.avif') }}) !important;

    }
    .form-div{
        border-radius: unset !important;
    }
	
</style>
{{-- @endssection --}}

@section('content')
<section class="min-vh-100  d-flex align-items-center justify-content-center">
	<div class="bg-overlay"></div>
	{{-- <div class="container-fluid px-0">
		<div class="row g-0">
			<div class="col-xl-8 col-lg-6" >
				<div class="h-100 mb-0 d-flex flex-column justify-content-between" >
                    <div style="">
                    <img src="{{ asset('assets/images/tradexcombatlog2.png') }}" alt="" style="background-size:cover; background-position:center;    max-height: 594px;">

                    </div>


				</div>

			</div>
            <div class="col-xl-8 col-lg-6" >
				<div class="h-100 mb-0 d-flex flex-column justify-content-between" style="background-image: url({{ asset('assets/images/tradexcombatlog2.png') }}); background-size: cover;
            ">


				</div>
			</div>
			<div class="col-xl-4 col-lg-6">
				<div class="card mb-0 py-4">

					<div class="card-body p-4 p-sm-5 m-lg-2">
						<div class="text-center mt-2">
							<h5 class="text-primary fs-20">Sign In</h5>
							<p class="text-muted">Hi Welcome to TradexCombat, Please Sign In!!</p>
						</div>
						<div class="mt-4 text-center">
							<p class="mb-0">Don’t have an account ? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Get Started </a> </p>
						</div>
						<div class="p-2 mt-5">
							<form method="POST" class="needs-validation" novalidate action="{{ route('login') }}">
							@csrf

								<div class="mb-3">
									<input type="email" class="form-control" id="useremail" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
									<div class="invalid-feedback">
										Please enter email
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

								<div class="mb-4">
									<p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the TradexCombat <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
								</div>

								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
									<label class="form-check-label" for="auth-remember-check">Remember me</label>
									@if (Route::has('password.request'))
									<div class="float-end">
										<a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
									</div>
									@endif
								</div>

								<div class="mt-4">
									<button class="btn btn-primary w-100" type="submit">{{ __('Sign In') }}</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div> --}}
    <div class="container p-4">
        <div class="row">
            <div class="col-xl-6 col-lg-6 login-bg-img ">

            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card mb-0 form-div">

					<div class="card-body  p-sm-5 m-lg-2">
						<div class="text-center mt-2">
                            <div class="d-flex align-items-center mb-2">
						<div class="flex-grow-1 pb-3">
							<img src="{{ asset('assets/images/Logo-2.png') }}" alt="" height="32" />
						</div>
					</div>
							<h5 class="text-primary fs-20">Sign In</h5>
							<p class="text-muted">Hi Welcome to TradexCombat, Please Sign In!!</p>
						</div>
						{{-- <div class="mt-4 text-center">
							<p class="mb-0">Don’t have an account ? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Get Started </a> </p>
						</div> --}}
						<div class="p-2 mt-5">
							<form method="POST" class="needs-validation" novalidate action="{{ route('login') }}">
							@csrf

								<div class="mb-3">
									<input type="email" class="form-control" id="useremail" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
									<div class="invalid-feedback">
										Please enter email
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

								<div class="mb-4">
									<p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the TradexCombat <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
								</div>

								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
									<label class="form-check-label" for="auth-remember-check">Remember me</label>
									@if (Route::has('password.request'))
									<div class="float-end">
										<a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
									</div>
									@endif
								</div>

								<div class="mt-4">
									<button class="btn btn-primary w-100" type="submit">{{ __('Sign In') }}</button>
								</div>
							</form>
						</div>

					</div>
					<!-- end card body -->
				</div>
            </div>

        </div>
    </div>
	<!--end conatiner-->
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('password-addon');
        const passwordInput = document.getElementById('password-input');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            this.querySelector('i').classList.toggle('ri-eye-fill');
            this.querySelector('i').classList.toggle('ri-eye-off-fill');
        });
    });
</script>

@endsection
