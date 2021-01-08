<!doctype html>
<html lang="en">
@include('partials.head')
<body>
<div id="app">
    <section class="hunter-welcome">
        @include('partials.header')
        <div>
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
                            <h3 class="card-title pb-3 font-weight-bolder"><a href="#">Разрешения</a> на охоту</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ducimus eius eos excepturi fugit laborum nemo placeat quam quidem ratione, saepe similique voluptatem voluptatibus. Dolores fugit possimus qui temporibus veniam.</p>
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
            <h2 class="hunter-tours-h2 pb-3"><span>Туры</span> охотные. Крутые</h2>
            <p class="w-75 text-justify pb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, ad aliquam asperiores debitis eum excepturi explicabo harum iste labore modi perspiciatis placeat praesentium quaerat quam ratione reiciendis sint totam vel.</p>
            <a class="hunter-text-orange mb-3" href="/tours">Посмотреть все туры</a>
            <div class="card-deck">
                <div class="card border-0">
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
                <div class="card border-0">
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
                <div class="card border-0">
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
            </div>
        </div>
    </section>
    <section class="hunter-start-hunt d-flex align-items-center">
        <div class="container d-flex justify-content-center">
            <div class="col-md-8 mt-5 pr-0 pl-0 d-flex justify-content-center">
                <div class="w-50 text-center mt-5">
                    <h2 class="text-white font-weight-bolder text-center pb-5">Найди себя настоящего на настоящей охоте</h2>
                    <a class="btn hunter-start-hunt-btn" href="/tours">Посмотреть туры</a>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer.footer')
</div>
</body>
</html>
