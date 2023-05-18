<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){

            $teacher = new Teacher();
            $teacher->address = $faker->address();
            $teacher->cv = $faker->text();
            $teacher->picture = $faker->text();
            $teacher->phone = $faker->phoneNumber();
            $teacher->credit_card = $faker->creditCardNumber();

            $teacher->save();
        }
    }
}