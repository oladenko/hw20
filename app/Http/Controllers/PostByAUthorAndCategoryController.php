<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Tag;

class PostByAuthorAndCategoryController
{
    public function __invoke($authorId, $categoryId)
    {
        $posts =Post::where('user_id',$authorId)->where('category_id', $categoryId)->paginate(15);

        //TODO: Implement __invoke() method.

        return view('pages.posts', compact('posts'));

    }
}
