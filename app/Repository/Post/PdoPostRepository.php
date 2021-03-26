<?php


namespace App\Repository\Post;


use App\Models\Post;

class PdoPostRepository implements PostRepositoryInterface
{

    public function all()
    {
        return Post::all();
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function create(array $field)
    {
        return Post::create($field);
    }

    public function update($id, array $field)
    {
        $post = $this->find($id);
        $post->uodate($field);
        return $post;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        return $post->delete($id);
    }
}
