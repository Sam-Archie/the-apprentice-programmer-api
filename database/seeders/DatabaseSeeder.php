<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->hasComments(3)->hasAttached(Tag::factory()->count(3))->create();
    }
    }

