@extends('layouts.default')

@section('page')
<div class="container my-5" style="height: 100vh">
    <div class="row">
        <div class="col-lg-4">
            <h1>Контакты</h1>
            <p>Если у Вас есть какие-либо вопросы относительно сайта, вы можете позвонить по бесплатному телефону 8 800 500 0000 или отправить нам сообщение.</p>
            <p class="hunter-text-orange">8 800 500 0000</p>
            <p>pochta@mail.ru</p>
            <a class="btn ml-auto hunter-start-hunt-btn hunter-border-orange hunter-text-orange w-100" href="#" data-toggle="modal" data-target="#fbModal">Связаться с менеджером</a>
        </div>
        <div class="col-lg-8">
            <img src="{{asset('images/bear_big.png')}}">
        </div>
    </div>
</div>
    <hunter-fb-modal></hunter-fb-modal>
@endsection
