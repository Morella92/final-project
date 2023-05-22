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

        $messages = [
            [
                'title' => 'Richiesta informazioni',
                'text' => 'Salve, sono interessato al vostro corso e desidero ricevere informazioni dettagliate. 
                Vorrei sapere i requisiti di ammissione e la durata complessiva del corso. Inoltre, 
                mi piacerebbe conoscere il programma dettagliato e le competenze acquisite al termine. 
                Potreste fornirmi informazioni sulle modalità di insegnamento? Infine, sono disponibili 
                agevolazioni economiche o borse di studio? Grazie e attendo una vostra cortese risposta. 
                Cordiali saluti.',
            ],
            [
                'title' => 'Richiesta prenotazione',
                'text' => 'Salve, sono interessato al corso programmato, richiedo informazioni sulle date, gli orari, 
                la durata e il costo del corso. Spero di poter effettuare il pagamento in più rate. 
                Sono entusiasta di partecipare al corso e ringrazio per la disponibilità. Attendo una 
                vostra risposta. Grazie',
            ],
            [
                'title' => 'Richiesta anullamento',
                'text' => "Sono spiacente di comunicare che desidero annullare la mia iscrizione al corso. 
                Ho riflettuto attentamente e ho deciso di procedere all'annullamento a causa delle mie attuali 
                circostanze personali. Vi ringrazio per l'opportunità offertami e mi scuso per eventuali disagi. 
                Vi prego di confermare l'annullamento e fornire istruzioni, se necessario. Grazie per la 
                comprensione e vi auguro il meglio per il futuro.",
            ],
        ];

        for($i=0; $i<15; $i++){

            $message = new Message();

            foreach($messages as $mess){
                $message->title = $mess['title'];
                $message->text = $mess['text'];
            }
            
            $message->ui_name = $faker->name();
            $message->ui_email = $faker->email();
            $message->ui_phone = $faker->phoneNumber();

            $message->teacher_id = $faker->randomElement($teacherIds);
            $message->save();
        }
    }
}