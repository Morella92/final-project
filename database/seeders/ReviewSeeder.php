<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Review;
use App\Models\Teacher;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $teacherIds = Teacher::all()->pluck('id')->all();

        $reviews = [
            
            "Sono profondamente deluso dalla prestazione del corso. Le lezioni erano poco chiare e il 
            materiale didattico era insufficiente. L'insegnante sembrava poco preparato e non riusciva 
            a rispondere alle nostre domande. Non ho appreso nulla di nuovo e ho trovato la lezione noiosa. 
            Non consiglierei questo corso a nessuno.",

            "Mi dispiace dover esprimere una valutazione così bassa per questo corso. Ho trovato la prestazione
            del corso estremamente deludente. La qualità del materiale didattico era scarsa e poco esaustiva, 
            rendendo difficile comprendere i concetti chiave. La metodologia di insegnamento era confusa e poco 
            organizzata, mancava di struttura e chiarezza. Gli esercizi e le attività proposte erano poco coinvolgenti 
            e non riuscivo a trovare motivazione nell'apprendimento. Spero che in futuro siano apportate miglioramenti 
            significativi per offrire una migliore esperienza di apprendimento agli studenti.",

            "La prestazione del corso è stata discreta. Ho apprezzato alcuni concetti trattati durante le lezioni, 
            ma ho trovato che altri argomenti fossero un po' confusi. Gli esercizi proposti sono stati utili per mettere 
            in pratica le nozioni apprese, ma avrei preferito una maggiore varietà di attività. L'insegnante era competente, 
            ma avrei gradito una maggiore chiarezza nelle spiegazioni. Nel complesso, il corso ha fornito una buona base, 
            ma ci sarebbe stato spazio per miglioramenti.",

            "Mi sono trovato molto bene con questo corso. Gli argomenti trattati sono stati presentati in modo chiaro e esaustivo, 
            permettendomi di acquisire conoscenze preziose. L'insegnante è stato competente e disponibile nel rispondere alle mie 
            domande. Le lezioni sono state strutturate in maniera organizzata, rendendo l'apprendimento facile e piacevole. 
            Le risorse fornite, come materiale didattico e esercizi pratici, sono state utili per consolidare quanto appreso. 
            Nel complesso, consiglio vivamente questo corso, che mi ha aiutato a migliorare le mie competenze nel settore.",

            "Sono estremamente soddisfatto della prestazione del corso! Gli argomenti trattati sono stati presentati in modo chiaro 
            e dettagliato, consentendomi di acquisire una solida comprensione dei concetti fondamentali.
            Il docente è stato straordinario nel comunicare le informazioni in modo coinvolgente ed entusiasmante. La sua passione per 
            il soggetto si è riversata nella mia motivazione e mi ha spinto ad approfondire ulteriormente gli argomenti.
            Ho apprezzato particolarmente l'approccio pratico del corso, che mi ha permesso di mettere in pratica ciò che stavo imparando.",

            "Gli esercizi e le attività sono stati di grande aiuto per consolidare le mie competenze.
            La struttura del corso è stata ben organizzata e sequenziale, consentendomi di seguire facilmente il percorso di apprendimento. 
            Ho apprezzato anche la disponibilità del materiale di supporto, come slide e risorse aggiuntive.
            Nel complesso, consiglierei questo corso a chiunque desideri acquisire competenze solide e pratiche. 
            È stato un'esperienza formativa eccezionale e mi ha fornito una base solida per il mio percorso professionale.",

            "È stato un corso eccezionale! La prestazione del docente è stata davvero eccellente. Le sue spiegazioni erano chiare e coinvolgenti, 
            rendendo il materiale facilmente comprensibile. Ho apprezzato particolarmente l'approccio pratico del corso, che mi ha permesso di 
            mettere subito in pratica le conoscenze acquisite. Il corso è stato strutturato in modo efficace, coprendo tutti gli argomenti 
            chiave in modo completo. Inoltre, l'interazione con gli altri partecipanti è stata stimolante e arricchente. 
            Consiglio vivamente questo corso a chiunque desideri ottenere una formazione di qualità!",
        ];

        for($i = 0; $i < 100; $i++){

            $review = new Review();
            $randomReview = $reviews[array_rand($reviews)];
            $review->user = $faker->firstName();
            $review->text = $randomReview;
            $review->teacher_id = $faker->randomElement($teacherIds);
            $review->save();
        }
        
    }
}