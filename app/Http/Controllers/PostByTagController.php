<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Tag;

class PostByTagController
{
//    public function __invoke($id)
//    {
//        // TODO: Implement __invoke() method.
//        $posts = Tag::where('tags.id', $id)->paginate(15);
//        return view('pages.posts', compact('posts'));
//    }
    public function __invoke($tag)
    {
        $tag = Tag::find($tag);
        $posts = $tag->posts()->paginate(15);
        // TODO: Implement __invoke() method.
       // $posts = Post::where('category_id', $id)->paginate(15);
        return view('pages.posts', compact('posts'));
    }
}
