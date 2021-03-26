<?php


namespace App\Repository\Post;


interface PostRepositoryInterface
{
public function all();

public function find($id);

public function create(array $field);

public function update($id , array $field);

public function delete($id);


}
