<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){

        
        return view('posts.create');
    }

    public function store(){

        
        $data = request()->validate([

            "title" => 'required',
            'image'=> 'required|image'

        ]);

        $pathname = request('image')->store('uploads','public');
        auth()->user()->posts()->create([
            "title" => $data["title"],
            'image'=> $pathname
        ]);
        
        return redirect('/profile/'.auth()->user()->id);
    }
}
