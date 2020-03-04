<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,8) as $index) {
        DB::table('categories')->insert([
        'clotherType' => $faker->jobTitle,
        'name' => $faker->randomElement($array = array ('Football', 'Basketball', 'Baseball', 'Voleyball', 'Tennis', 'Running', 'Boxing', 'Swimming')),
        ]);
        }
    }
}
