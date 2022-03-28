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

<div class="container">
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


		<div  class="container" style="max-width: 50%;">
        <form method="POST" action="/regprod" enctype="multipart/form-data">
            @csrf
                <select class="form-select mb-2" autofocus required name="product">
                <option selected disabled>Выберите товар</option>
                    <option value="Бытовой кондиционер">Бытовой кондиционер</option>
                </select>

                <select class="form-select form-select-sm mb-5" required name="category">
                <option selected disabled >Выберите категорию</option>
                    <option value="zspr-s">ZSPR-S</option>
                </select>

				<div class="form-floating">
                    <input class="form-control" placeholder="Имя товара" type="text" name="name" autofocus>
                    <label for="floatingInput">Имя товара</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" placeholder="Цена" type="text" name="price" >
                    <label for="floatingInput">Цена</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" placeholder="Вес товара" type="text" name="weght" >
                    <label for="floatingInput">Вес товара</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" placeholder="Описание товара" type="text" name="description"></textarea>
                    <label for="floatingTextarea2">Введите описание товара</label>
                </div>


<!-- Кнопки  -->
        
            <div class="row row-cols-auto">
                <div class="col">
                    <input class="form-control" type="file" name="profile_image">
                </div>
            <div class="col">
                    <input class="form-control" type="reset" value="Очистить"></p>
                </div>
            <div class="col">
                    <button class="btn btn-success" type="submit">Добавить</button>
                </div>
            </div>


    </form>
</div>


<hr>



		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>