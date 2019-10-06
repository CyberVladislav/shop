<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
        DB::table('products')->insert([
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 1000, $max = 9000), 
        'category_id'=> $faker->numberBetween(1,8),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'brand' => $faker->jobTitle,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'color' => $faker->safeColorName,
        'madeIn' => $faker->country,
        'material' => $faker->word,
        ]);
        }
    }
}
