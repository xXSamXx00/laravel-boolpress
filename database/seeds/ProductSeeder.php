<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $product = new Product();
            $product->name = $faker->sentence();
            $product->description = $faker->text();
            $product->image = $faker->imageUrl(600, 400, 'Products', $product->name);
            $product->price = $faker->randomFloat(2, 100, 200);
            $product->save();
        }
    }
}
