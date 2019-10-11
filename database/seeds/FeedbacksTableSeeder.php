<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,5) as $index) {
        DB::table('feedbacks')->insert([ 
        'user_id'=> $faker->numberBetween(1,3),
        'rating' => $faker->numberBetween(1,5),
        'desc' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);
        }
    }
}
