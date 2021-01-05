@extends('layouts.default')

@section('page')
    <div class="container mb-5">
        <h1 class="hunter-perm-title">Разрешение на охоту: <span>{{$perm->title}}</span></h1>
        <div class="row px-0">
            <div class="col-lg-8 col-md-10 frame_container" style="height: 400px">
                {!! $perm->map_frame !!}
            </div>
            <div class="col-lg-4 col-md-2">
                <div class="card mb-3 border-0" style="background: #F5F5F5;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bolder">Сезон охоты</h5>
                        <p class="card-text">{{date('d.m.Y', strtotime($perm->seasons[0]->date_from))}} - {{date('d.m.Y', strtotime($perm->seasons[0]->date_to))}}</p>
                        <h5 class="card-title font-weight-bolder">Место</h5>
                        <p class="card-text">{{$perm->location->title}}</p>
                        <h5 class="card-title font-weight-bolder">Стоимость лицензии</h5>
                        <p class="card-text font-weight-bold hunter-text-green">от {{$perm->price_full}} руб</p>
                    </div>
                </div>
                <a class="btn ml-auto hunter-start-hunt-btn hunter-border-orange hunter-text-orange w-100" href="#" data-toggle="modal" data-target="#permModal">Получить разрешение</a>
            </div>
        </div>
        <h1 class="font-weight-bold mt-4">Туры</h1>
        @foreach($tours as $tour)
            <div class="row px-0 pt-4">
                <div class="col-7 d-flex align-items-center">
                    <p>{{$tour->title}}</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <h4 class="hunter-perm-title"><span>{{$tour->price_full}} руб</span></h4>
                </div>
                <div class="col-3 d-flex">
                    <a class="btn ml-auto hunter-start-hunt-btn hunter-border-orange hunter-text-orange" href="/tours/{{$tour->id}}">Посмотреть туры</a>
                </div>
                <div class="w-75 border mb-3"></div>
            </div>
        @endforeach
    </div>
    <hunter-perm-modal :license="{{json_encode($perm)}}"></hunter-perm-modal>
@endsection
