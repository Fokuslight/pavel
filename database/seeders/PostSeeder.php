<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(10)->create([
            'user_id' => User::first()->id,
        ]);

        $tags = Tag::all();

        foreach ($posts as $post) {
            $post->tags()->attach($tags->random()->take(3)->pluck('id'));
        }
    }
}
