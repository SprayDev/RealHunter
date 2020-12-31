@extends('layouts.default')

@section('page')
<div class="container pt-5 py-5">
    <h1 class="h1 pb-3">
        Список разрешений
    </h1>
    <p>
        Разрешение. Любой вид охоты может осуществляться только после получения разрешения на добычу охотничьих ресурсов, допускающего отлов или отстрел одной или нескольких особей диких животных
    </p>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="inputState">Регион охоты</label>
            <select id="inputState" class="form-control">
                <option selected>Выберите регион</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Сезон охоты</label>
            <select id="inputState" class="form-control">
                <option selected>Выберите дату</option>
                <option>...</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="position-relative cursor-pointer hunter-perm-lg-item">
                <img src="{{asset('images/bear.png')}}" class="card-img-top" alt="...">
                <div style="position: absolute; bottom: 0;height: 56px;background: rgba(0, 0, 0, 0.5);width: 100%">
                    <h3 class="text-white p-3">Бурый медвед</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="position-relative cursor-pointer hunter-perm-lg-item">
                <img src="{{asset('images/bear.png')}}" class="card-img-top" alt="...">
                <div style="position: absolute; bottom: 0;height: 56px;background: rgba(0, 0, 0, 0.5);width: 100%;">
                    <h3 class="text-white p-3">Бурый медвед</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="position-relative cursor-pointer hunter-perm-lg-item">
                <img src="{{asset('images/bear.png')}}" class="card-img-top" alt="...">
                <div style="position: absolute; bottom: 0;height: 56px;background: rgba(0, 0, 0, 0.5);width: 100%">
                    <h3 class="text-white p-3">Бурый медвед</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="w-100 py-3"></div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4">
            <div class="row">
                <div class="col pr-0">
                    <img width="120" height="120" class="rounded-circle" src="{{asset('images/bear.png')}}">
                </div>
                <div class="col d-flex align-items-center pl-0">
                    <h4>Бурый мишка</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container w-100 border">

</div>
@endsection
