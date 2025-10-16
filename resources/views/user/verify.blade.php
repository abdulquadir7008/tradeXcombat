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
	.notfiy{
		color:"#919EAB";
		font-size:18px
	}
	.Icon-position{
		position: absolute;
    width: 24px;
    height: 13px;
    top: 15px;
    left: 10px;
	}
	.return-link{
		text-align:center;
		margin:30px;
	}
	.return-link a{
		color:#fff
	}
	.return-link span{
		margin-right:5px;
	}
	.inputNumber{
		text-align:center;
		
	}
	.inputNumber input{
		width: 12%;
		display:inline-block;
		margin: 0 1.5%;
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
					<img src="{{ asset('assets/images/ic-email-inbox.png') }}" alt="" height="96" style="margin-top:20px" />
							<h5 class="fs-20 signIn">Please check your email!</h5>
							<p style="color:#919EAB;">We've emailed a 6-digit confirmation code. Please enter the code in below box to verify your email.
                               </p>
						</div>
						
						<div class="p-2 mt-5">
							<form method="POST" class="needs-validation" novalidate action="{{ route('login') }}">
							@csrf

								<div class="mb-3 inputNumber">
									
									<input type="text" class="form-control" id="useremail" name="email" value="" required autofocus>
									<input type="text" class="form-control" id="useremail" name="email" value="" required autofocus>
									<input type="text" class="form-control" id="useremail" name="email" value="" required autofocus>
									<input type="text" class="form-control" id="useremail" name="email" value="" required autofocus>
									<input type="text" class="form-control" id="useremail" name="email" value="" required autofocus>
									<input type="text" class="form-control" id="useremail" name="email" value="" required autofocus>
									
								</div>

								
								<div class="mt-4">
									<button class="btn btn-primary w-100" type="submit">{{ __('Verify') }}</button>
								</div>
							</form>
						</div>

						<div class="return-link"><a href="{{ route('user.login') }}"><span class="mdi mdi-arrow-left"></span>Return to sign in</a></div>

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
