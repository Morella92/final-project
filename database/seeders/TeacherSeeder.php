<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Specialization;
use App\Models\Sponsorship;
use App\Models\Vote;
use App\Models\Message;
use App\Models\Review;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $userIds = User::pluck('id')->all();
        $specializationIds = Specialization::all()->pluck('id')->all();
        $sponsorshipIds = Sponsorship::all()->pluck('id')->all();
        $voteIds = Vote::all()->pluck('id')->all();
        

        foreach ($userIds as $userId) {
            $teacher = new Teacher();
            $teacher->user_id = $userId;
            $teacher->address = $faker->address();
            $teacher->cv = $faker->text();
            $teacher->picture = $faker->text();
            $teacher->phone = $faker->phoneNumber();
            $teacher->credit_card = $faker->creditCardNumber();

            
            $teacher->save();

            $randomSpecializationIds = $faker->randomElements($specializationIds, rand(1,2));
            $teacher->specializations()->attach($randomSpecializationIds);

            $randomSponsorshipIds = $faker->randomElements($sponsorshipIds, rand(1,2));
            $teacher->sponsorships()->attach($randomSponsorshipIds);

            $randomVoteIds = $faker->randomElements($voteIds, rand(1,5));
            $teacher->votes()->attach($randomVoteIds);
        }
    }
}