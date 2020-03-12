<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index($user)
    {
        
        $user = User::findOrFail($user);
        return view('profiles.index',["user" => $user]);
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
