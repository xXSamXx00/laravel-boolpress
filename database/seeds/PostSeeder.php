<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->title = $faker->sentence();
            $post->slug = Str::slug($post->title);
            $post->image = $faker->imageUrl(600, 400, 'Posts', $post->title);
            $post->body = $faker->text();
            $post->save();
        }
    }
}
