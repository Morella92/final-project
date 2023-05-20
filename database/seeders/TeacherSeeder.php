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
        $address = [
            'Vesterbrogade 12, Copenaghen, Danimarca',
            'Via Maranello 20, Modena, Italia',
            'Mühlenstraße 8 Berlino, Germania',
            'Hauptstraße 15, Francoforte, Germania',
            'Fischerweg 5, Zurigo, Svizzera',
            'Thompson Street 7, New York, Stati Uniti',
            'Calle Principal 23, Madrid, Spagna',
            'Smith Street 10, Londra, Regno Unito',
            'Brown Avenue 3, Boston, Stati Uniti',
            'Clark Road 14, Sydney, Australia',
            'Tanaka-cho 2, Tokyo, Giappone',
            'Yamamoto-dori 6, Kyoto, Giappone',
            'Ling Lane 9, Pechino, Cina',
            'Patel Nagar 11, Mumbai, India',
            'Via Roma 148, Ravenna Italia',
            'Via serra 15, Como Italia'
            ];
            
            $address = array_values($address); // Reindicizza l'array $address per mantenere l'ordine degli indici
            $addressCount = count($address); // Numero di elementi nell'array $address
            $addressIndex = 0;
           

        $userIds = User::pluck('id')->all();
       
        $specializationIds = Specialization::all()->pluck('id')->all();
        $sponsorshipIds = Sponsorship::all()->pluck('id')->all();
        $voteIds = Vote::all()->pluck('id')->all();
              

        foreach ($userIds as $userId){
            $teacher = new Teacher();
            $teacher->id = $userId;
            $teacher->user_id = $userId;
            $teacher->address = $address[$addressIndex];
            echo "Address Index: " . $addressIndex . "\n";
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

            $addressIndex = ($addressIndex + 1) % $addressCount;
        }
    }
}