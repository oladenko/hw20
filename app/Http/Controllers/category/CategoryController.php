<?php


namespace App\Http\Controllers\category;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController
{
    public function create()
    {



        $categories = Category::all();


        return view('category.form', compact( 'categories'));


    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title'       => ['required', 'unique:categories,title'],
            'slug'        => ['required', 'min:10'],


        ]);
        $category = Category::create($data);

        return redirect()->route('home');

    }

    public function edit(Category $category)
    {

        $categories = Category::all();



        return view('category.form', compact( 'categories', 'category'));
    }

    public function update(Category $category, Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'unique:categories,title'],
            'slug'        => ['required', 'min:10'],


        ]);
        $category->update($data);

        return redirect()->route('home');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('home');

    }

}
