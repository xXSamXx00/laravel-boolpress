<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Comunity', 'Fullstack Developer', 'Frontend Developer', 'Backend Developer', 'Web Designer'];

        foreach ($tags as $tag) {
            $_cat = new Tag();
            $_cat->name = $tag;
            $_cat->slug = Str::slug($tag);
            $_cat->save();
        }
    }
}
