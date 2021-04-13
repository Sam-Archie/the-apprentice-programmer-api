<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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
        User::factory(10)->hasPosts(3)->create();
        foreach(Post::all() as $post) {
            $post->factory()->hasComments(5)->create();
            $post->factory()->hasAttached(Tag::factory()->count(10))->create();
        }
    }
}

