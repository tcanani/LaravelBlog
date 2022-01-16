<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //Validation
        request()->validate([
            'body' => 'required|min:3'
        ]);

        //Add a comment to the given post
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success','Comment added!');
    }
}
