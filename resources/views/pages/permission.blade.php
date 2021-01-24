@extends('layouts.default')
@php
    $currentLoc = 1;
@endphp
@section('page')
    <div class="container mb-5 py-5">
        <h1 class="hunter-perm-title">Разрешение на охоту: <span>{{$perm->title}}</span></h1>
        <div class="row px-0">
            <div class="col-lg-8 col-md-10 frame_container" style="height: 400px">
                {!! $perm->map_frame !!}
            </div>
            <div class="col-lg-4 col-md-2">
                <div class="card mb-3 border-0" style="background: #F5F5F5;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bolder">Сезон охоты</h5>
                        @foreach($perm->location as $k=>$loc)
                            @if($currentLoc != [strtotime($loc->pivot->season_start), strtotime($loc->pivot->season_end)])
                                <p class="card-text">{{date('d.m.Y', strtotime($loc->pivot->season_start))}} - {{date('d.m.Y', strtotime($loc->pivot->season_end))}}</p>
                            @endif
                                @php
                                    $currentLoc = [strtotime($loc->pivot->season_start), strtotime($loc->pivot->season_end)];
                                @endphp
                        @endforeach
                        <h5 class="card-title font-weight-bolder">Места</h5>
                        @foreach($perm->location as $loc)
                            <p class="card-text">{{$loc->title}}</p>
                        @endforeach
                        <h5 class="card-title font-weight-bolder">Стоимость лицензии</h5>
                        <p class="card-text font-weight-bold hunter-text-green">от {{$perm->price_full}} руб {{$perm->cost_max>0 && $perm->cost_max != $perm->cost_min ? " до {$perm->price_max_full} руб" : ''}}</p>
                    </div>
                </div>
                <a class="btn hunter-btn-orange ml-auto w-100" href="#" data-toggle="modal" data-target="#permModal">Получить разрешение</a>
            </div>
        </div>
        <h1 class="font-weight-bold mt-4">Туры</h1>
        @foreach($tours as $tour)
            <div class="row px-0 pt-4">
                <div class="col-lg-7 col-md-5 col-sm-5 col-12 d-flex align-items-center">
                    <p style="font-size: 1.125rem !important;">{{$tour->title}}</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6 d-flex align-items-center justify-content-end hunter-jc-start">
                    <p class="hunter-perm-title"><span>{{$tour->price_full}} руб</span></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-6 d-flex mb-2">
                    <a class="btn ml-auto hunter-start-hunt-btn hunter-border-orange hunter-text-orange" href="/tours/{{$tour->id}}">Посмотреть тур</a>
                </div>
                <div class="w-75 h-w-100 border mb-3"></div>
            </div>
        @endforeach
    </div>
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
    <hunter-perm-modal :license="{{json_encode($perm)}}"></hunter-perm-modal>
@endsection
