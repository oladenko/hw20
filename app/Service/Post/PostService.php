<?php


namespace App\Service\Post;


use App\Repository\Post\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostService
{
    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }

    public function index()
    {
//    $repository = new PdoPostRepository();
        dd($this->repository->all());
    }

    public function store(array $data)
    {

        $this->repository->create($data);
    }

    public function update(array $data, $id)
    {

        $this->repository->update($data, $id);
    }
    public function delete($id)
    {
        $this->repository->delete($id);
    }

}
