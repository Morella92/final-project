<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Teacher;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $userIds = User::pluck('id')->toArray();

        foreach ($userIds as $userId) {
            $teacher = new Teacher();
            $teacher->user_id = $userId;
            $teacher->address = $faker->address();
            $teacher->cv = $faker->text();
            $teacher->picture = $faker->text();
            $teacher->phone = $faker->phoneNumber();
            $teacher->credit_card = $faker->creditCardNumber();

            $teacher->save();
        }
    }
}