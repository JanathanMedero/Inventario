<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Pyscom Inventario</title>
	<!-- Favicon -->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="{{ asset('assets/dashboard/css/nucleo/nucleo.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('assets/dashboard/fontawesome/css/all.min.css') }}" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/dashboard/css/argon.css') }}" type="text/css">

	@yield('extra-css')

	@livewireStyles

</head>

<body>
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  align-items-center">
				<a class="navbar-brand" href="javascript:void(0)">
					<img src="{{ asset('assets/images/pyscom.png') }}" class="navbar-brand-img" alt="...">
				</a>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">
						<li class="nav-item {{ Request::is('admin') ? 'active_page' : '' }}">
							<a class="nav-link" href="#">
								<i class="ni ni-tv-2 {{ Request::is('admin') ? 'text-white' : 'text-primary' }}"></i>
								<span class="nav-link-text {{ Request::is('admin') ? 'text-white' : '' }}">Inicio</span>
							</a>
						</li>
						@if(Auth::user()->role_id === 1)
						<li class="nav-item {{ Request::is('employees') ? 'active_page' : '' }}">
							<a class="nav-link" href="{{ route('employe.index') }}">
								<i class="fas fa-users {{ Request::is('employees') ? 'text-white' : 'text-dark' }}"></i>
								<span class="nav-link-text {{ Request::is('employees') ? 'text-white' : '' }}">Empleados</span>
							</a>
						</li>
						@endif
						<li class="nav-item {{ Request::is('clients') ? 'active_page' : '' }}">
							<a class="nav-link" href="#">
								<i class="fas fa-users {{ Request::is('clients') ? 'text-white' : 'text-info' }}"></i>
								<span class="nav-link-text {{ Request::is('clients') ? 'text-white' : '' }}">Clientes</span>
							</a>
						</li>
						<li class="nav-item {{ Request::is('table-orders-sale') ? 'active_page' : '' }}">
							<a class="nav-link" href="#">
								<i class="fas fa-dollar-sign {{ Request::is('table-orders-sale') ? 'text-white' : 'text-success' }}"></i>
								<span class="nav-link-text {{ Request::is('table-orders-sale') ? 'text-white' : '' }}">Ordenes de venta</span>
							</a>
						</li>
						<li class="nav-item {{ Request::is('table-orders-services') ? 'active_page' : '' }}">
							<a class="nav-link" href="#">
								<i class="fas fa-concierge-bell {{ Request::is('table-orders-services') ? 'text-white' : 'text-muted' }}"></i>
								<span class="nav-link-text {{ Request::is('table-orders-services') ? 'text-white' : '' }}">Ordenes de servicio</span>
							</a>
						</li>
						<li class="nav-item {{ Request::is('table-orders-services-on-site') ? 'active_page' : '' }}">
							<a class="nav-link" href="#">
								<i class="fas fa-city text-danger {{ Request::is('table-orders-services-on-site') ? 'text-white' : 'text-danger' }}"></i>
								<span class="nav-link-text {{ Request::is('table-orders-services-on-site') ? 'text-white' : '' }}">Ordenes de servicio en sitio</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background-color: #133aa1;">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Search form -->
					
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item d-sm-none">
							<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
								<i class="ni ni-zoom-split-in"></i>
							</a>
						</li>
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="media align-items-center">
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"></i>
								<span>Cerrar Sesión</span>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- Header -->

<!-- Page content -->

@yield('content')

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/jquery.scroll-lock/jquery-scrollLock.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('assets/dashboard/vendor/chart.js/Chart.min.js') }}"></script>
{{-- <script src="{{ asset('assets/dashboard/chart.js/Chart.extension.js') }}"></script> --}}
<!-- Argon JS -->
<script src="{{ asset('assets/dashboard/js/argon.js') }}"></script>

@yield('extra-js')

@livewireScripts

</body>

</html>
