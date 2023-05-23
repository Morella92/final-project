<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $votes = [1, 2, 3, 4, 5];

        foreach($votes as $vote ){

            $newVote = new Vote();
            $newVote-> vote = $vote;
            
            $newVote->save();
        }
    }
}