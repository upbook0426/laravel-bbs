<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory()->count(50)
            ->create()
            ->each(function ($post){
                $comments = \App\Models\Comment::factory()->count(2)
                ->make();
                $post->comments()->saveMany($comments);
            });
    }
}
