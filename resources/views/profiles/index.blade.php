@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row pt-5">
       <div class="col-4"><img src="/storage/{{$user->profile->picture()}}" class="rounded-circle m-5 w-75" alt="profile"></div>
       <div class="col-8 mt-5">
       <div class="d-flex justify-content-between align-items-baseline">
           <h1>{{$user->username}}</h1>
           @can('update', $user->profile)
           <a href="\p\create">new post</a>
       @endcan
           
       </div>
       @can('update', $user->profile)
       <a class="btn btn-secondary text-none text-white" href="\profile\{{$user->id}}\edit">edit profile</a>
       @else
    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
       @endcan
    
       <div class="d-flex pt-3">
       <div class="pr-3"><strong>{{$postCount}}</strong> posts</div>
           <div class="px-3"><strong>{{$followersCount}}</strong> folowers</div>
           <div class="pl-3"><strong>{{$followingCount}}</strong> folowing</div>
       </div>
    <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
    <div>{{$user->profile->description}}</div>
       <div>
       <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
       </div>
   </div>
   <div class="row w-100">
    @foreach ($user->posts as $post)
    <div class="col-4 pb-4" >
    <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100" alt=""></a>
    </div>
   @endforeach
     
   </div>
</div>
@endsection
