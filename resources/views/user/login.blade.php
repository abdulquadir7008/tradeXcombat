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
    .mainlogin{
        width:500px; margin:auto
    }
    .signIn{
		color:"#fff"
	}
    .get-start{
        color:#0078DD;
        font-weight:bold;
        margin-left:20px;
    }
</style>
{{-- @endssection --}}

@section('content')
<section class="min-vh-100  d-flex align-items-center justify-content-center">
	<div class="bg-overlay"></div>

    <div class="container p-4">
         <div class="card mb-0 form-div mainlogin">

					<div class="card-body  p-sm-5 m-lg-2">
						<div class="text-center mt-2">
                            <div class="d-flex align-items-center mb-2">
						<div class="flex-grow-1 pb-3">
							<img src="{{ asset('assets/images/Logo-2.png') }}" alt="" height="32" />
						</div>
					</div>
							<h5 class="fs-20 signIn">Sign In</h5>
							<p class="text-muted">Don’t have an account ? 
                                <a href="{{ route('password.request') }}" class="get-start fs-20">Get Started</a></p>
						</div>
						{{-- <div class="mt-4 text-center">
							<p class="mb-0">Don’t have an account ? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Get Started </a> </p>
						</div> --}}
						<div class="p-2 mt-5">
							<form method="POST" class="needs-validation" novalidate action="{{ route('login') }}">
							@csrf

								<div class="mb-3">
									<input type="email" class="form-control" id="useremail" name="email" value="" placeholder="Username, Email, Phone Number" required autofocus>
									<div class="invalid-feedback">
										Please enter Username, Email, Phone Number
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
