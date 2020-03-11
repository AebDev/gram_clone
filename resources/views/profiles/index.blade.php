@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row pt-5">
       <div class="col-4"><img src="\img\index.jpg" class="rounded-circle m-5" alt="profile"></div>
       <div class="col-8 mt-5">
       <div class="d-flex justify-content-between align-items-baseline">
           <h1>{{$user->username}}</h1>
           <a href="\p\create">new post</a>
       </div>
       <div class="d-flex">
           <div class="pr-3"><strong>153</strong> posts</div>
           <div class="px-3"><strong>23k</strong> folowers</div>
           <div class="pl-3"><strong>212</strong> folowing</div>
       </div>
    <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
    <div>{{$user->profile->description}}</div>
       <div>
       <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
       </div>
   </div>
   <div class="row">
       <div class="col-4" style="height:350px" >
       <img src="https://instagram.fcmn3-1.fna.fbcdn.net/v/t51.2885-15/e35/89485502_198087498118276_8717397081789116228_n.jpg?_nc_ht=instagram.fcmn3-1.fna.fbcdn.net&_nc_cat=104&_nc_ohc=sQU0cLuf2ZUAX_Mp6kt&oh=74295490b7c59eb55e234debdf9b903e&oe=5E9C3D07" class="w-100 h-100" alt=""></div>
       <div class="col-4" style="height:350px"><img src="https://instagram.fcmn3-1.fna.fbcdn.net/v/t51.2885-15/e35/88374782_543733416501650_6638052850750298038_n.jpg?_nc_ht=instagram.fcmn3-1.fna.fbcdn.net&_nc_cat=102&_nc_ohc=F92BfNmfxaIAX9vpmGU&oh=0088efaeaa1fc379f4998fae12d5a4db&oe=5EA5B8AC" class="w-100 h-100" alt=""></div>
       <div class="col-4" style="height:350px">
       <a href="#" ><img src="https://instagram.fcmn3-2.fna.fbcdn.net/v/t51.2885-15/e35/84217667_548898739065440_6328985649004661540_n.jpg?_nc_ht=instagram.fcmn3-2.fna.fbcdn.net&_nc_cat=108&_nc_ohc=iKbhNt99NHQAX8QBBIW&oh=18ddf5560407090512a6e900f44f14ce&oe=5E97C124" class="w-100 h-100"  alt=""></a>
       </div>
   </div>
</div>
@endsection
