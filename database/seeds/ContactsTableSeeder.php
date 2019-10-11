<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('contacts')->insert([
        'country' => $faker->country , 
        'street'=> $faker->streetAddress,
        'phone' => $faker->tollFreePhoneNumber,
        'workTime' =>("Mon to Fri 9am to 6 pm"),
        'email' => $faker->freeEmail,
        'desc' => ("Send us your query anytime!"),
        'location' => $faker->country,
        ]);
    }
}
