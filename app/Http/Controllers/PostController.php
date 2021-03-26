<?php


namespace App\Http\Controllers;


use App\Repository\Post\PdoPostRepository;
use App\Repository\Post\PostRepositoryInterface;
use App\Service\Post\PostFacade;
use Illuminate\Http\Request;

class PostController
{

    public function index()
    {
        PostFacade::index();
    }
    public function store(Request $request)
    {
        PostFacade::store($request->all());
    }
    public function update(Request $request, $id)
    {
        PostFacade::update($request->all(), $id);
    }
    public function delete($id)
    {
        PostFacade::delete($id);
    }

}
