@extends('layouts.default')

@section('page')
<div class="container my-5" style="height: 100vh">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <h1>Контакты</h1>
            <p>Если у Вас есть какие-либо вопросы относительно сайта, вы можете позвонить по бесплатному телефону <a class="hunter-text-orange" href="tel:+79835083158">+7 983 508 31 58</a> или отправить нам сообщение.</p>
            <p>Телефон: </p>
            <a class="hunter-text-orange" href="tel:+79835083158">+7-983-508-31-58</a>
            <br>
            <a class="hunter-text-orange" href="tel:+73912083158">+7(391)208-31-58</a>
            <p>info@realhunting</p>
            <p>
                Юридический адрес:
            </p>
            <p>
                660127, Красноярский кр, город Красноярск, улица Мате Залки, 4г, ПОМЕЩЕНИЕ 77
            </p>
            <a class="btn ml-auto hunter-start-hunt-btn hunter-border-orange hunter-text-orange w-100" href="#" data-toggle="modal" data-target="#fbModal">Связаться с менеджером</a>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 pt-3">
            <img src="{{asset('images/bear_big.png')}}" class="img-fluid">
        </div>
    </div>
</div>
<div class="container w-100 border"></div>
<div aria-live="polite" aria-atomic="true" style="position: absolute; top: 50px; right: 15px;min-height: 0px;width: 25%; ">
    <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;z-index: 1000">

        <!-- Then put toasts within -->
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Обратная связь</strong>
                <small class="text-muted"></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Сообщение отправлено, ждите ответа!
            </div>
        </div>
    </div>
</div>
    <hunter-fb-modal></hunter-fb-modal>
@endsection
