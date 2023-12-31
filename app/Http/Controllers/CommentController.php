<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
        request()->validate([
            'content' => 'required|min:2|max:100'
        ]);
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->content = request()->get('content');
        $comment->save();
        return redirect()->route('post.show', $post->id)->with('success' , "comment added");
    }
}