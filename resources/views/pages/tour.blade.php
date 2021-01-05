@extends('layouts.default')

@section('page')
    <hunter-page-tour :tour="{{json_encode($tour)}}" days="{{$days}}" :tours="{{json_encode($tours)}}"></hunter-page-tour>
    <div class="container w-100 border">
    </div>
@endsection
