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
        foreach (range(1,45) as $index) {
        DB::table('products')->insert([
        'name' => $faker->randomElement($array = array ('Air Force 1', 'Air Max', 'Questar ride', 'Yeezy', 'Zoom', 'Lite 4', 'Urdo')),
        'price' => $faker->numberBetween($min = 100, $max = 900), 
        'category_id'=> $faker->numberBetween(1,8),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'brand' => $faker->randomElement($array = array ('Nike', 'Puma', 'Adidas', 'Reebok', 'Slazengeer', 'New Balance', 'New Yorker', 'Marko')),
        'IsProductOfWeek' => $faker->numberBetween(0, 1),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'color' => $faker->safeColorName,
        'madeIn' => $faker->country,
        'material' => $faker->word,
        ]);
        }
    }
}
