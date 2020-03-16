@extends('layouts.app')

@section('content')
@foreach ($posts as $post)
<div class="container pt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="d-flex align-items-center pb-3">
                <div class="pr-3"><img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width:50px" alt="profile"></div>
                    <div><a class="text-dark" href="/profile/{{$post->user->id}}"><h3>{{$post->user->username}}</h3></a></div>
                </div>
        </div>
        <div class="col-6 offset-3">
        <a href="/profile/{{$post->user->id}}">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </a>
        </div>
        <div class="col-6 offset-3 pt-3 pb-4">
            
            <div class="d-flex">
            <strong class="pr-3"><a class="text-dark" href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></strong><span class="pr-3">-</span>
                <p>{{$post->title}}</p>
            </div>
        </div>
    </div>
</div>  
@endforeach
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection