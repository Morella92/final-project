<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $price = [
            2.99,
            5.99,
            9.99
        ];

        for($i=0; $i<10; $i++){

            $sponsorship = new Sponsorship();
            $sponsorship->price = $faker->randomElement($price);
            $sponsorship->description = $faker->text();
            $sponsorship->duration = $faker->date();

            $sponsorship->save();
        }
    }
}
