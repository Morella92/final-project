<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $user = User::create([
            'name' => 'Morena Piemontese',
            'email' => 'morena@gmail.com',
            'password' => Hash::make('morena'),
        ]);

        for($i=0; $i<10; $i++){

            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'password' => Hash::make($faker->word(10))
            ]);

        }
    }
}
