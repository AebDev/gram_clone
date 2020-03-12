@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center pb-3">
            <div class="pr-3"><img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width:50px" alt="profile"></div>
                <div><a class="text-dark" href="/profile/{{$post->user->id}}"><h3>{{$post->user->username}}</h3></a></div>
                <div><a href="#"><strong class="text-active pl-3">Follow</strong></a></div>
            </div>
            <div class="d-flex">
            <strong class="pr-3"><a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></strong><span class="pr-3">-</span>
                <p>{{$post->title}}</p>
            </div>
        </div>
    </div>
    </div>
@endsection