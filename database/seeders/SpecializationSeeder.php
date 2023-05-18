<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){

            $specialization = new Specialization();
            $specialization->name = $faker->sentence();
            $specialization->description = $faker->text();
            $specialization->expertise = $faker->sentence();

            $specialization->save();
        }
    }
}
