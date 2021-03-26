<?php


namespace App\Service\Post;


use App\Repository\Post\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class PostFacadeServiceProvider extends ServiceProvider
{
public function register()
{
   $this->app->bind('postService', function( $app){
       return new PostService(
           $app->make(PostRepositoryInterface::class)
       );
   });
}
}
