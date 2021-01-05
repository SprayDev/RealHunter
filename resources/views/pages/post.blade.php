@extends('layouts.default')

@section('page')
    <hunter-page-post :blog="{{json_encode($blog)}}"></hunter-page-post>
    <div class="container w-100 border">
    </div>
@endsection
