<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Review;
use App\Models\Teacher;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $teacherIds = Teacher::all()->pluck('id')->all();

        for($i=0; $i<10; $i++){

            $review = new Review();
            $review->text = $faker->sentence();
            $review->teacher_id = $faker->optional()->randomElement($teacherIds);
            $review->save();
    }
    }
}