@extends('layouts.default')

@section('page')
<div class="container my-5" style="height: 100vh">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <h1>Контакты</h1>
            <p>Если у Вас есть какие-либо вопросы относительно сайта, вы можете позвонить по бесплатному телефону <a class="hunter-text-orange" href="tel:+79835083158">+7 983 508 31 58</a> или отправить нам сообщение.</p>
            <a class="hunter-text-orange" href="tel:+79835083158">+7 983 508 31 58</a>
            <p>pochta@mail.ru</p>
            <a class="btn ml-auto hunter-start-hunt-btn hunter-border-orange hunter-text-orange w-100" href="#" data-toggle="modal" data-target="#fbModal">Связаться с менеджером</a>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 pt-3">
            <img src="{{asset('images/bear_big.png')}}" class="img-fluid">
        </div>
    </div>
</div>
    <hunter-fb-modal></hunter-fb-modal>
@endsection
