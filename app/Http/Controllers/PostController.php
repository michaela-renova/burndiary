<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $userPost = $request->validate([
            'title' => 'nullable',
            'content' => 'required'
        ], [
            'content.required' => "Příspěvek nemůže být prázdný.",
            
         ]);


        $userPost['title'] = strip_tags($userPost['title']);
        $userPost['content'] = strip_tags($userPost['content']);

        $userPost['user_id'] = auth()->id();
        Post::create($userPost);

        return redirect('/');
    }

    public function editPost(Post $post) {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request){
          if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        $userPost = $request->validate([
            'title' => 'nullable',
            'content' => 'required'
        ]);

        $userPost['title'] = strip_tags($userPost['title']);
        $userPost['content'] = strip_tags($userPost['content']);

        $post->update($userPost);
        return redirect('/dashboard');

    }

    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
             return redirect('/dashboard');

        }else{
        return redirect('/');
    }

    }

    
}
