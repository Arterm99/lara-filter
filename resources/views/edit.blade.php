<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Главная@endsection

<!-- Начало кода -->
@section('content')

<div class="container" style="padding: 4%;">
    <div>
        <h3>{{ $table->name }}</h3>
    </div>
        <div class="container">
            <div class="row row-cols-2">
                     <div class="alert alert-light">
                        <div class="row row-cols-2">
                            <span> <h3> {{ $table->name }} </h3> </span>
                            <span style="color: green; text-align: end; font-size: 24px;"> {{ $table->price." руб" }} </span>
                            <span> {{ $table->category }} </span>
                        </div> 

                        <span> {{ $table->product }} </span>
                        <span> {{ $table->description }} </span>

                        <img class="img-thumbnail" src="{{ asset($table->profile_image)  }}" title="{{ $table->name }}">
                        <div class="row">
                            <div class="col">
                                                           
                                <form action="{{ route('delete-product', $table->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="alert alert-light">
                        <h3>Технические характеристики</h3>
                            <div  class="container">
                                    <form method="POST" action="{{ route('edit-product', $table->id) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                            <select class="form-select mb-2" autofocus required name="product">
                                            <option selected disabled>Выберите товар</option>
                                                <option value="Бытовой кондиционер"> {{$table->product}} </option>
                                            </select>

                                            <select class="form-select form-select-sm mb-5" required name="category">
                                            <option selected disabled >Выберите категорию</option>
                                                <option value="zspr-s"> {{$table->category}} </option>
                                            </select>

                                            <div class="form-floating">
                                                <input class="form-control" placeholder="Имя товара" type="text" name="name" autofocus>
                                                <label for="floatingInput"> {{$table->name}} </label>
                                            </div>
                                            <div class="form-floating">
                                                <input class="form-control" placeholder="Цена" type="text" name="price" >
                                                <label for="floatingInput"> {{$table->price}} </label>
                                            </div>
                                            <div class="form-floating">
                                                <input class="form-control" placeholder="Вес товара" type="text" name="weght" >
                                                <label for="floatingInput"> {{$table->weght}} </label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" placeholder="Описание товара" type="text" name="description"></textarea>
                                                <label for="floatingTextarea2">  {{$table->description}} </label>
                                            </div>


                            <!-- Кнопки  -->
                                    
                                        <div class="row row-cols-auto">
                                            <div class="col">
                                                <input class="form-control" type="file" name="profile_image"></input>
                                            </div>
                                        <div class="col">
                                                <input class="form-control" type="reset" value="Очистить"></p>
                                            </div>
                                        <div class="col">
                                                <button class="btn btn-success" type="submit">Обновить</button>
                                            </div>
                                        </div>
                                </form>

                            </div>
                    </div>
            </div>
        </div>
</div>




<!-- Конец кода -->
@endsection