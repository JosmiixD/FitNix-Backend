
@extends('index')
@section('title','Widaos | Iniciar sesión')
@section('content')
	@csrf
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('metronic/assets/media/bg/bg-2.jpg') }});">
				<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
					<!--begin::Login Header-->
					<div class="d-flex flex-center mb-5">
						<a href="{{ route('index') }}">
							<img src="{{ asset('images/widaos-logo.png') }}" class="max-h-75px" alt="" />
							<img src="{{ asset('images/widaos-texto.png') }}" class="max-h-100px w-100" style="object-fit: contain;" alt="" />
						</a>
					</div>
					<!--end::Login Header-->
					<!--begin::Login Sign in form-->
					<div class="login-signin">
						<div class="mb-20">
							<h3 class="opacity-40 font-weight-normal">Acceso de usuarios</h3>
							<p class="opacity-40">Ingresa tus credenciales de inicio de sesión correctamente</p>
						</div>
						<form class="form" id="login_users_form" method="POST" action="{{ route('login') }}">
							@csrf
							@if(Session::has('session-expired'))
								<div class="alert alert-custom alert-notice alert-light-warning fade show" role="alert">
									<div class="alert-icon"><i class="flaticon-warning"></i></div>
									<div class="alert-text">{{ Session::get('session-expired') }}</div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true"><i class="ki ki-close"></i></span>
										</button>
									</div>
								</div>
							@endif
							@if(count($errors) > 0)
								@foreach ($errors->all() as $message)
									<div class="alert alert-custom alert-notice alert-light-warning fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-warning"></i></div>
										<div class="alert-text">{{ $message }}</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="ki ki-close"></i></span>
											</button>
										</div>
									</div>
								@endforeach
							@endif
							<div class="form-group">
								<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="email" placeholder="Usuario" name="email" autocomplete="off" />
							</div>
							<div class="form-group">
								<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="Contraseña" name="password" autocomplete="current-password"/>
							</div>
							<div class="form-group d-flex flex-wrap justify-content-center align-items-center px-8 opacity-60">
								<div class="checkbox-inline">
									<label class="checkbox checkbox-outline checkbox-white text-white m-0">
									<input type="checkbox" name="remember" />
									<span></span>Recuérdame</label>
								</div>
							</div>
							<div class="form-group text-center mt-10">
								<button type="submit" id="sign_up_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Iniciar sesión</button>
							</div>
						</form>
					</div>
					<!--end::Login Sign in form-->
				</div>
			</div>
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->
@endsection
@push('scripts')
    {{-- <script type="text/javascript" src="{{  URL::asset ('js/admin/banks/banks.js?v='.rand())  }}"></script> --}}
@endpush