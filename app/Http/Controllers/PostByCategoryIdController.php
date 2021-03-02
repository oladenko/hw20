<?php


namespace App\Http\Controllers;


use App\Models\Post;

class PostByCategoryIdController
{

    public function __invoke($id)
    {
        // TODO: Implement __invoke() method.
        $posts = Post::where('category_id', $id)->paginate(15);
        return view('pages.posts', compact('posts'));
    }
}
