<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css') }} ">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
		<div class="collapse navbar-collapse">
			<div class="navbar-nav">
				<a class="navbar-brand">Dunia Elektronik</a>
				<a class="nav-item nav-link" href="{{route("kategori.index")}}">Kategori</a>
				<a class="nav-item nav-link" href="{{route("produks.index")}}">Product</a>
				<a class="nav-item nav-link" href="{{route("konsumen.index")}}">Konsumen</a>
				<a class="nav-item nav-link" href="{{route("penjualan.index")}}">Penjualan</a>
				<a class="nav-item nav-link" href="{{route("detail_penjualan.index")}}">Detail Penjualan</a>
			</div>
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
					{{ __('Logout') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
			@endguest
		</ul>
	</div>
</nav>

<div class="container">
	@yield('content')
</div>
<script type="{{ asset('js/app.js') }}"></script>
</body>
</html>