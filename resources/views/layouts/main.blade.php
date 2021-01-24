<!doctype html>
<html lang="en">
@include('partials.head')
<body>
<div id="app">
    @include('partials.header')
    <section class="hunter-welcome">
        <div class="pt-5">
            @yield('page')
        </div>
    </section>
    <section>
        <!--hunter-container-header-->
        <div class="container d-flex justify-content-center pt-5 mt-5 pb-5 mb-5">
            <div class="card mb-3 border-0">
                <div class="row no-gutters">
                    <div class="col-lg-6 hunter-card-text pl-3">
                        <div class="card-body">
                            <h1 class="card-title pb-3 font-weight-bolder"><a href="#">Разрешения</a> на охоту</h1>
                            <p class="card-text">Лицензия на охоту – это документ, который даёт право охотиться на лицензируемые виды животных и дичи.
                                Путёвка нужна для охоты только в частных охотничьих хозяйствах. Этот документ подтверждает, что человек заключил с юрлицом или ИП договор об оказании услуг.</p>
                        </div>
                        <div class="hunter-card-footer">
                            <a href="/permissions">Посмотреть все разрешения</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('images/rifle.png')}}" class="card-img" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <!--hunter-container-header-->
        <div class="container">
            <h1 class="hunter-tours-h2 pb-3"><span>Охотничьи туры</span></h1>
            <p class="w-75 h-w-100 text-justify">Комплекс услуг, предлагаемых нашей компанией «RealHunting», для любителей охоты, не может оставить равнодушным даже истинного ценителя комфортного отдыха на природе. Ведь в наших силах не только удовлетворить охотничий азарт, возможно, живущий в каждом человеке, но и предложить нечто большее, чем просто охота.
                </p>
            <p>Получить консультацию специалиста по интересующим вопросам можно по тел: <a class="hunter-text-orange" href="tel:+73912083158">+7(391)208-31-58</a></p>
            <a class="hunter-text-orange" href="/tours">Посмотреть все туры</a>
            <div class="card-deck mt-2">
                @foreach($tours as $tour)
                    <a class="card border-0 pb-2" href="{{route('tours.single', ['slug' => 1])}}">
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
                        <div class="card-body hunter-card-body pb-1">
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
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="hunter-start-hunt d-flex align-items-center">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8 mt-5 pr-0 pl-0 d-flex justify-content-center">
                <div class="w-100 text-center mt-5 pt-5">
                    <h3 class="text-white font-weight-bolder text-center pb-2">Найди себя настоящего на настоящей охоте</h3>
                    <a class="btn hunter-start-hunt-btn" href="/tours">Начать охоту</a>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer.footer')
</div>
</body>
</html>
