<?php


namespace App\Http\Controllers\tag;


use App\Models\tag;
use Illuminate\Http\Request;

class TagController
{
    public function create()
    {



        $tags = tag::all();


        return view('tag.form', compact( 'tags'));


    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title'       => ['required', 'unique:tags,title'],
            'slug'        => ['required', 'min:10'],


        ]);
        $tag = Tag::create($data);

        return redirect()->route('home');

    }

    public function edit(tag $tag)
    {

        $tags = tag::all();



        return view('tag.form', compact( 'tags', 'tag'));
    }

    public function update(Tag $tag, Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'unique:tags,title'],
            'slug'        => ['required', 'min:10'],


        ]);
        $tag->update($data);

        return redirect()->route('home');
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('home');

    }

}
