<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8";>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title-block')</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/custum.scss">
	<link rel="stylesheet" href="/css/custum.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>

<body class="">

<div class="container colorrr">
	<span class="colorrr-red"> qwerty </span>
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">ICON</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Главная</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Профиль</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Витрина</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Команда</a></li>      

				<div style="display: flex; background: aliceblue;">
					@if (Route::has('login'))
			
							@auth
								<li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Профиль</a></li>
							@else
								<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Войти</a></li>

								@if (Route::has('register'))
								<li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Зарегестрироваться</a></li>
								@endif
							@endauth
				
					@endif  

					</div>
			</ul>

			</header>
		</div>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>