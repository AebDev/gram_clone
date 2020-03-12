@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div>
            <h3>{{$post->user->username}}</h3>
            </div>
            <div>
                {{$post->title}}
            </div>
        </div>
    </div>
    </div>
@endsection