@extends('layouts.default')

@section('page')
<hunter-perms-post :perms="{{json_encode($perms)}}"></hunter-perms-post>
<div class="container w-100 border">

</div>
@endsection
