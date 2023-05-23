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
        $length = count($name);


        $addresses = [
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

        
        for($i=0; $i<$length; $i++){

            User::create([
                'name' => $name[$index],
                'email' => $emails[$index],
                'password' => Hash::make($faker->word(10)),
                'address' => $addresses[$index]

            ]);
            
            $index = ($index + 1) % $nameCount;
        }
        $user = User::create([
            'name' => 'Morena Piemontese',
            'email' => 'morena@gmail.com',
            'password' => Hash::make('morena'),
            'address' => 'Via Dubai 1254, Dubai',
        ]);
    }
}