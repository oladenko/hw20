<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(10)->create();
        $categories = Category::factory()->count(25)->create();
        $tags = Tag::factory()->count(100)->create();
        $post = Post::factory()->count(1000)->make(['user_id' => null, 'category_id' => null])->each(function ($post) use ($users,$categories) {
            $post->user_id = $users->random()->id;
            $post->category_id = $categories->random()->id;
            $post->save();
        });
        $post->each(function ($post) use ($tags){
            $post->tags()->attach($tags->random(rand(5,10))->pluck('id'));
        });
    }
}
