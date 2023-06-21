<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>Login | {{ env('APP_NAME') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="#" />
		<meta name="keywords" content="#" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />

		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="{{ env('APP_NAME') }}" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content=">{{ env('APP_NAME') }}" />

		<link rel="canonical" href="#" />
		<link rel="shortcut icon" href="{{ URL::asset('assets/auth/media/logos/favicon.ico') }}"/>
        <link rel="dns-prefetch" href="{{ url('fonts.gstatic.com') }}">
		<link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700') }}" />

		<link href="{{ URL::asset('assets/auth/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css') }}">
		<link href="{{ URL::asset('assets/auth/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/auth/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <style>
            body {
                background-image:linear-gradient(#7239EA, blue);
            }
            .placeholder-white::placeholder {
                color: black;
            }
            input, select, textarea{
                color: #ff0000;
            }

            textarea:focus, input:focus {
                color: #ff0000;
            }
			.btn {
				background-color: #ffffff;
				color: black;
			}
        </style>


	</head>
        <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!-- Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/metronic/theme/html/demo1/dist/assets/media/bg/bg-1.jpg);">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('assets/auth/chef.png') }}" class="max-h-100px" alt="" height="250px" width="250px" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ session()->get('error') }}</li>
                                </ul>
                            </div>
                            @endif
							<form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<input class="form-control h-auto placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 @error('email') is-invalid @enderror" type="email" placeholder="E-mail" name="email" autocomplete="off" value="{{ old('email') }}"/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
								<div class="form-group">
									<input class="form-control h-auto placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5  @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
									<div class="checkbox-inline">
                                        <input class="form-check-input m-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="checkbox checkbox-outline checkbox-white text-white m-0" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        </div>
								</div>
								<div class="form-group text-center mt-10">
									<button id="kt_login_signin_submit" class="btn btn-outline-white font-weight-bold px-15 py-3">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Page Scripts-->
	</body>

        <script src="{{ URL::asset('assets/auth/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/scripts.bundle.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/custom/modals/select-location.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/custom/widgets.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/custom/modals/upgrade-plan.js') }}"></script>
		<script src="{{ URL::asset('assets/auth/js/custom/intro.js') }}"></script>
        <script src="{{ URL::asset('assets/auth/js/script.js') }}"></script>
	</body>
	<!--end::Body-->
</html>