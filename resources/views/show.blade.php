<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Продуктовая панель@endsection

<!-- Начало кода -->
@section('content')

<div class="container" style="padding: 4%;">
    <div>
        <h3>Продуктовая панель</h3>
    </div>
        <div class="container">
            <div class="row row-cols-3">
                @foreach($table as $key)
                     <div class="alert alert-light">
                        <div class="row row-cols-2">
                            <span> <h3> {{ $key->name }} </h3> </span>
                            <span style="color: green; text-align: end; font-size: 24px;"> {{ $key->price." руб" }} </span>
                            <span> {{ $key->category }} </span>
                            <span style="color: grey; text-align: end; font-size: 14px;"> {{ $key->weght." кг" }} </span>
                        </div> 

                        <span> {{ $key->product }} </span>
                        <span> {{ $key->description }} </span>

                        <a href="{{ route('one-show-product', $key->id) }}"> <img class="img-thumbnail" src="{{ asset($key->profile_image)  }}" title="{{ $key->name }}"></a>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('one-show-product', $key->id) }}" class="mx-auto btn btn-outline-dark">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
@endsection