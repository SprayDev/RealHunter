@extends('layouts.default')

@section('page')
    <div class="container my-5">
        <hunter-page-blog :blogs="{{json_encode($blogs)}}"></hunter-page-blog>
    </div>
    <div class="container w-100 border">
    </div>
@endsection
