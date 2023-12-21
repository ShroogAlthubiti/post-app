<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index(){
      
        return view('welcome' , ['posts' => Post::orderBy('created_at','DESC')->paginate(5)]);
    }
    public function store(){
        
        request()->validate([
            'content' => 'required|min:2|max:100'
        ]);
        $post =  Post::create([
            'content' => request()->get('content') ,
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->route('home')->with('success' ,'post creates successfully');
    }
    public function show(Post $post){
       return view('post.show' , ['posts' => $post]);
    }
}