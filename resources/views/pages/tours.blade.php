@extends('layouts.default')

@section('page')
    <div class="container pt-5 py-5" style="min-height: 100vh">
        <h1 class="h1 pb-3">
            Туры охотные. Крутые
        </h1>
        <p class="text-justify">
            Если Вас заинтересовал какой-то из представленных охотничьих туров, присылайте свои заявки на наш электронный адрес, указав свои координаты - ФИО, телефон. Наши организаторы свяжутся с Вами и расскажут более подробно о интересующем Вас туре. Или предложат что-то новое.
        </p>
        <div class="row">
            @foreach($tours as $tour)
                <div class="card border-0 col-lg-4 col-md-4 col-sm-6 cursor-pointer mb-4" onclick="window.location.href = 'tours/{{$tour->id}}'">
                    <div class="cutCorner-2">
                        <div class="hunter-images">
                            @foreach($tour->images() as $img)
                                @if($img['type'] == 'extra')
                                    <img class="d-inline" src="{{asset($img['path'])}}">
                                @endif
                            @endforeach
                        </div>
                        @foreach($tour->images() as $img)
                            @if($img['type'] == 'main')
                                <img src="{{asset($img['path'])}}" class="card-img-top" alt="...">
                            @endif
                        @endforeach
                    </div>
                    <div class="card-body hunter-card-body">
                        <h5 class="card-title hunter-card-title">{{$tour->title}}</h5>
                        <p class="card-text">{{$tour->location->title}}</p>
                        @php
                            $origin = date_create($tour->available_period_min);
                            $target = date_create($tour->available_period_max);
                            $interval = date_diff($origin, $target);
                        @endphp
                        <p class="card-text">{{$interval->format('%a дней')}}, с {{date('d.m.Y', strtotime($tour->available_period_min))}} до {{date('d.m.Y', strtotime($tour->available_period_max))}}</p>
                    </div>
                    <div class="">
                        <h5 class="hunter-text-orange">от {{$tour->PriceFull}} руб</h5>
                    </div>
                </div>
            @endforeach

            <!--<div class="card border-0 col-lg-4 col-md-4 col-sm-6">
                <div>
                    <img src="{{asset('images/olen.png')}}" class="card-img-top" alt="...">
                </div>
                <div class="card-body hunter-card-body">
                    <h5 class="card-title hunter-card-title">Охота на <span>сибирскую косулю</span></h5>
                    <p class="card-text">Камчатский край, Усть-Камчатский район</p>
                    <p class="card-text">7 дней, до 28.12.20</p>
                </div>
                <div class="">
                    <h3 class="hunter-text-orange">от 100 000 руб</h3>
                </div>
            </div>
            <div class="card border-0 col-lg-4 col-md-4 col-sm-6">
                <div class="cutCorner-1">
                    <div class="hunter-images">
                        <img class="d-inline" src="{{asset('images/car.svg')}}">
                    </div>
                    <img src="{{asset('images/roga.png')}}" class="card-img-top" alt="...">
                </div>
                <div class="card-body hunter-card-body">
                    <h5 class="card-title hunter-card-title">Охота на <span>сибирского козерога</span></h5>
                    <p class="card-text">Камчатский край, Усть-Камчатский район</p>
                    <p class="card-text">5 дней, до 12.01.20</p>
                </div>
                <div class="">
                    <h3 class="hunter-text-orange">от 60 000 руб</h3>
                </div>
            </div>
            <div class="card border-0 col-lg-4 col-md-4 col-sm-6">
                <div class="cutCorner-2">
                    <div class="hunter-images">
                        <img class="d-inline" src="{{asset('images/car.svg')}}">
                        <img class="d-inline" src="{{asset('images/car.svg')}}">
                    </div>
                    <img src="{{asset('images/bear.png')}}" class="card-img-top" alt="...">
                </div>
                <div class="card-body hunter-card-body">
                    <h5 class="card-title hunter-card-title">Осенняя охота на Камчатского <span>бурого медведя</span> в 2021 году</h5>
                    <p class="card-text">Камчатский край, Усть-Камчатский район</p>
                    <p class="card-text">14 дней, с 25.08.21 до 30.11.21</p>
                </div>
                <div class="">
                    <h3 class="hunter-text-orange">от 460 000 руб</h3>
                </div>
            </div>
            <div class="card border-0 col-lg-4 col-md-4 col-sm-6">
                <div>
                    <img src="{{asset('images/olen.png')}}" class="card-img-top" alt="...">
                </div>
                <div class="card-body hunter-card-body">
                    <h5 class="card-title hunter-card-title">Охота на <span>сибирскую косулю</span></h5>
                    <p class="card-text">Камчатский край, Усть-Камчатский район</p>
                    <p class="card-text">7 дней, до 28.12.20</p>
                </div>
                <div class="">
                    <h3 class="hunter-text-orange">от 100 000 руб</h3>
                </div>
            </div>
            <div class="card border-0 col-lg-4 col-md-4 col-sm-6">
                <div class="cutCorner-1">
                    <div class="hunter-images">
                        <img class="d-inline" src="{{asset('images/car.svg')}}">
                    </div>
                    <img src="{{asset('images/roga.png')}}" class="card-img-top" alt="...">
                </div>
                <div class="card-body hunter-card-body">
                    <h5 class="card-title hunter-card-title">Охота на <span>сибирского козерога</span></h5>
                    <p class="card-text">Камчатский край, Усть-Камчатский район</p>
                    <p class="card-text">5 дней, до 12.01.20</p>
                </div>
                <div class="">
                    <h3 class="hunter-text-orange">от 60 000 руб</h3>
                </div>
            </div>-->
        </div>
    </div>
    <div class="container w-100 border">

    </div>
@endsection
