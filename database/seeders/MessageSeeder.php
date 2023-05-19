<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Message;
use App\Models\Teacher;

class MessageSeeder extends Seeder
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

            $message = new Message();
            $message->title = $faker->sentence();
            $message->text = $faker->text();
            $message->ui_name = $faker->name();
            $message->ui_email = $faker->email();
            $message->ui_phone = $faker->phoneNumber();

            $message->teacher_id = $faker->optional()->randomElement($teacherIds);
            $message->save();
    }
}
}