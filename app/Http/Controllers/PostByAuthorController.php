<?php


namespace App\Http\Controllers;


use App\Models\Post;

class PostByAuthorController
{
    public function __invoke($id)
    {
        // TODO: Implement __invoke() method.
        $posts = Post::where('user_id', $id)->paginate(15);
        return view('pages.posts', compact('posts'));
    }
}
