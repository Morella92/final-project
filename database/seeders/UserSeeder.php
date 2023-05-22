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
        $name=[
            'Lars Andersen', 
            'Alessandro Ferrari', 
            'Anna Müller', 
            'Gabriel Schmidt', 
            'Elena Fischer', 
            'Jackson Thompson', 
            'Ethan Rodriguez', 
            'Ava Smith', 
            'Benjamin Brown', 
            'Mia Clark', 
            'Hiroshi Tanaka', 
            'Sakura Yamamoto', 
            'Mei Ling', 
            'Raj Patel', 
            'Giovanni Rotella'
        ];
        $nameCount = count($name);
        $index = 0;

        $emails = [
            'lars.andersen@post.tele.dk', 
            'alessandro.ferrari@gmail.com', 
            'anna.müller@versanet.de',
            'gabriel.schmidt@mail.de',
            'elena.fischer@bluemail.ch', 
            'jackson.thompson@aol.com',
            'ethan.rodriguez@yahoo.es', 
            'ava.smith@virginmedia.com',
            'benjaminbrown@icloud.com',
            'miaclark@att.net',
            'hiroshitanaka@ocn.ne.jp', 
            'sakurayamamoto@biglobe.ne.jp',  
            'meiling@wo.com.cn',
            'rajipatel@zoo.com',
            'giovanni.rotella@libero.it',
        ];

        for($i=0; $i<15; $i++){

            User::create([
                'name' => $name[$index],
                'email' => $emails[$index],
                'password' => Hash::make($faker->word(10))

            ]);
            
            $index = ($index + 1) % $nameCount;
        }
        $user = User::create([
            'name' => 'Morena Piemontese',
            'email' => 'morena@gmail.com',
            'password' => Hash::make('morena'),
        ]);
    }
}