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
        

        $phones = [
            '+45 12345678',
            '+39 0123456789',
            '+49 1234567890',
            '+49 9876543210',
            '+41 7878787878',
            '+1 2125556789',
            '+34 612345678',
            '+44 2071234567',
            '+1 1619876543',
            '+61 290123456',
            '+81 345678901',
            '+81 234567890',
            '+86 13987654321',
            '+91 9876543210',
            '+39 3456789123',
            '+33 1234567891'
        ];

        $pictures = [
            '/img/volti/lars-andersen.png',
            '/img/volti/alessandro-ferrari.png',
            '/img/volti/anna-muller.png',
            '/img/volti/gabriel-schmidt.png',
            '/img/volti/elena-fisher.png',
            '/img/volti/jackson-thompson.png',
            '/img/volti/ethan-rodriguez.png',
            '/img/volti/ava-smith.png',
            '/img/volti/benjamin-brown.png',
            '/img/volti/mia-clark.png',
            '/img/volti/hiroshi-tanaka.png',
            '/img/volti/sakura-yamamoto.png',
            '/img/volti/mei-ling.png',
            '/img/volti/raj-patel.png',
            '/img/volti/giovanni-rotella.png',
            '/img/volti/morena-piemontese.png',
        ];

        $cvs = [
            '/img/cv/CV-1.png',
            '/img/cv/CV-2.png',
            '/img/cv/CV-3.png',
            '/img/cv/CV-4.png',
            '/img/cv/CV-5.png',
            '/img/cv/CV-6.png',
            '/img/cv/CV-7.png',
            '/img/cv/CV-8.png',
            '/img/cv/CV-9.png',
            '/img/cv/CV-10.png',
            '/img/cv/CV-11.png',
            '/img/cv/CV-12.png',
            '/img/cv/CV-13.png',
            '/img/cv/CV-14.png',
            '/img/cv/CV-15.png',
            '/img/cv/CV-16.png',
        ];

        $userIds = User::pluck('id')->all();
       
        $specializationIds = Specialization::all()->pluck('id')->all();
        $sponsorshipIds = Sponsorship::all()->pluck('id')->all();
        $voteIds = Vote::all()->pluck('id')->all();
              
        foreach ($userIds as $userId){
        
            $teacher = new Teacher();
            $teacher->id = $userId;
            $teacher->user_id = $userId;
            $teacher->cv = $cvs[$userId - 1];
            $teacher->picture = $pictures[$userId - 1];
            $teacher->phone = $phones[$userId - 1];
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