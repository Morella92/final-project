<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $sponsorships =[
            [
                'price' => 2.99,
                'duration' => 24,
                'description' => "Sponsorizza il tuo profilo da teacher per 24 ore e massimizza 
                la visibilità delle tue lezioni. Il tuo profilo sarà evidenziato nella sezione 
                dedicata agli utenti in cerca di insegnanti e riceverà maggiore attenzione da parte
                degli studenti interessati. Approfitta di questa opportunità per aumentare 
                l'esposizione delle tue competenze e raggiungere un pubblico più ampio."
            ],
            [
                'price' => 5.99,
                'duration' => 72,
                'description' => "Porta il tuo profilo al livello successivo con il pacchetto di 
                sponsorizzazione di 72 ore. Durante questo periodo, il tuo profilo sarà in evidenza, 
                garantendoti una posizione privilegiata nelle ricerche degli utenti. 
                Sfrutta questa promozione per attirare ancora più studenti e promuovere le tue lezioni 
                in modo efficace. Ottieni una visibilità duratura e aumenta le tue opportunità 
                di insegnamento."
            ],
            [
                'price' => 9.99,
                'duration' => 144,
                'description' => "Fai brillare il tuo profilo per un'intera settimana con il pacchetto di 
                sponsorizzazione di 144 ore. Questa opzione ti offre un'elevata esposizione, posizionando 
                il tuo profilo in cima alla lista dei teacher consigliati. Approfitta di questa offerta per 
                catturare l'attenzione degli studenti e costruire la tua reputazione come insegnante di qualità. 
                Massimizza il tuo potenziale di guadagno e amplia la tua base di studenti con questa 
                sponsorizzazione di lunga durata."
            ],
        ];
    

        foreach($sponsorships as $package){

            $sponsorship = new Sponsorship();
            $sponsorship->price = $package['price'];
            $sponsorship->duration = $package['duration'];
            $sponsorship->description = $package['description'];

            $sponsorship->save();
        }
    }
}
