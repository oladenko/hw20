<?php


namespace App\Repository\Post;


use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
public function register()
{
    $this->app->singleton( PostRepositoryInterface::class, function (){
        return new PdoPostRepository();
    });
}
}
