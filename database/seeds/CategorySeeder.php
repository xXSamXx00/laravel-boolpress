<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Programming', 'Automation', 'Web design', 'Best Practices'];

        foreach ($categories as $category) {
            $_cat = new Category();
            $_cat->name = $category;
            $_cat->slug = Str::slug($category);
            $_cat->save();
        }
    }
}
