<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index($user)
    {
        
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : FALSE;

        
        $postCount = Cache::remember(
            'count.posts.'.$user->id,
            now()->addSeconds(30),
            function() use($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers.'.$user->id,
            now()->addSeconds(30),
            function() use($user){
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.following.'.$user->id,
        now()->addSeconds(30),
        function() use($user){
        return $user->following->count();;
    });

        return view('profiles.index',compact("user", 'follows','postCount','followersCount','followingCount'));
    }

    public function edit(User $user){
        
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){
        $this->authorize('update',$user->profile);
        $pathname = $user->profile->image;

        $user->profile = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => ''
        ]);

        if(request('image')){

            $pathname = request('image')->store('profile','public');
            $image = Image::make(\public_path('storage/'.$pathname))->fit('1000','1000');
            $image->save();
            
        }

        auth()->user()->profile()->update(array_merge($user->profile,['image'=>$pathname]));
        return redirect('/profile/'.$user->id);
    }
}
