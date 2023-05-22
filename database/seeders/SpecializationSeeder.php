<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $specializations = [

            [
                'name' => 'Maestro del benessere spirituale',                         
                'expertise' => 'Maestro',
                'description' => "Il  Maestro  del  benessere  spirituale  è  un  professionista  che  si  occupa  di  guidare  e 
                supportare gli individui nel loro percorso di crescita interiore, equilibrio e benessere 
                spirituale.  Attraverso  l'uso  di  tecniche  e  pratiche  come  la  meditazione,  la 
                visualizzazione,  la  guarigione  energetica  e  la  consapevolezza,  il  Maestro  del 
                benessere  spirituale  aiuta  le  persone  a  connettersi  con  il  proprio  sé  interiore,  a 
                scoprire  la  propria  saggezza  interiore  e  a  sviluppare  una  maggiore  consapevolezza 
                spirituale. Questa figura professionale fornisce un ambiente sicuro e di supporto per 
                l'esplorazione  e  la  trasformazione  personale,  promuovendo  il  benessere  spirituale  e 
                l'equilibrio nella vita quotidiana.",
            ],

            [
                'name' => 'Esperto di crescita finanziaria rapida',
                'expertise' =>  'Esperto',
                'description' => "L'Esperto  di  crescita finanziaria  rapida  è  un  professionista  specializzato 
                nell'identificazione e nell'attuazione di strategie finanziarie innovative per accelerare 
                la  crescita  economica.  Utilizzando  un  approccio  analitico  e  creativo,  collabora  con 
                individui,  imprese  e  organizzazioni  per  massimizzare  il  rendimento  degli 
                investimenti,  migliorare  l'efficienza  operativa  e  sviluppare  opportunità  di  crescita  a 
                breve  termine.  Attraverso  l'analisi  dei  dati finanziari,  lo  studio  dei  mercati  e 
                l'applicazione di modelli di business innovativi, l'esperto di crescita finanziaria rapida 
                è  in  grado  di  identificare  soluzioni  personalizzate  per  ottenere  risultati finanziari 
                straordinari in un breve lasso di tempo.",
            ],          
            [ 
                'name' => 'Coach di vita spirituale',
                'expertise' => 'Professionista',
                'description' => "Un  coach  di  vita  spirituale  è  un  professionista  che  aiuta  le  persone  a  esplorare  e 
                sviluppare il loro benessere spirituale. Attraverso un approccio personalizzato, guida i 
                clienti  nella  scoperta  dei  loro  valori,  delle  credenze  e  degli  obiettivi  spirituali, 
                offrendo  supporto,  ispirazione  e  motivazione  lungo  il  percorso.  Il  coach  di  vita 
                spirituale fornisce strumenti pratici per approfondire la connessione con se stessi, gli 
                altri  e  il  mondo  circostante,  promuovendo  la  crescita  personale,  la  consapevolezza, 
                l'autenticità  e  l'equilibrio  interiore.  Questa  professione  mira  a  favorire  una  vita  più 
                significativa,  centrata  e  armoniosa,  facilitando  la  realizzazione  del  potenziale 
                spirituale dei clienti.",
            ],
            [
                'name' => 'Specialista di marketing magico',
                'expertise' => 'Guru',
                'description' => "Lo  Specialista  di  marketing  magico  è  un  esperto  nel  combinare  incantesimi  e 
                strategie di marketing per creare campagne uniche ed efficaci. Utilizza il potere della 
                magia  per  incantare  il  pubblico,  creando  esperienze  indimenticabili  e  coinvolgenti. 
                Sfruttando incantesimi di persuasione e telepatia, lo Specialista di marketing magico 
                è  in  grado  di  comprendere  i  desideri  e  le  aspettative  dei  clienti,  offrendo  loro 
                soluzioni  personalizzate.  Con  una  combinazione  di  creatività,  intuizione  e  abilità 
                magiche,  lo  Specialista  di  marketing  magico  aiuta  le  aziende  a  distinguersi  dalla 
                concorrenza e a raggiungere il successo nel mondo affascinante del marketing.",
            ],
            [
                'name' => 'Esperto di pulizia energetica delle case',
                'expertise' => 'Guru',
                'description' => "L'esperto  di  pulizia  energetica  negativa  delle  case  è  un  professionista  specializzato 
                nel  rilevare  e  rimuovere  le  energie  negative  presenti  negli  ambienti  domestici. 
                Utilizzando  strumenti  e  tecniche  specifiche,  analizza  le  energie  disarmoniche  e  le 
                fonti  di  disturbo,  come  campi  elettromagnetici  o  presenze  energetiche  indesiderate. 
                Attraverso  pratiche  di  purificazione  energetica,  come  la  smagnetizzazione, 
                l'incensazione  o  l'utilizzo  di  cristalli,  l'esperto  ripristina  l'equilibrio  e  l'armonia 
                nell'ambiente,  promuovendo  un'energia  positiva  e  favorevole  alla  salute  e  al 
                benessere  degli  abitanti.  Collabora  anche  con  i  proprietari  per  fornire  consigli  su 
                come mantenere l'equilibrio energetico nel tempo.",
            ],
            [
                'name' => 'Maestro alla lettura delle foglie del tè',
                'expertise' => 'Maestro',
                'description' => "Il Maestro della lettura delle foglie del tè è un esperto che interpreta simboli e segni 
                presenti nelle foglie del tè dopo la loro infusione. Con abilità intuitive e conoscenza 
                delle  tradizioni,  analizza  la  forma,  la  posizione  e  i  pattern  delle  foglie  per  predire 
                eventi  futuri  o  dare  consigli.  Utilizzando  l'arte  della  divinazione,  questo  maestro 
                decodifica i messaggi nascosti nel tè, offrendo saggezza e guida ai suoi clienti. La sua 
                pratica  richiede  attenzione,  intuizione  e  capacità  di  comunicare  in  modo  empatico, 
                creando un'esperienza unica di scoperta e introspezione attraverso il semplice atto di 
                bere una tazza di tè.",
            ],
            [
                'name' => 'Consulente di illuminazione cosmica',
                'expertise' => 'Illustre',
                'description' => "Il Consulente di Illuminazione Cosmica è un professionista che si occupa di offrire 
                supporto  e  guida  nell'approfondimento  della  connessione  tra  l'individuo  e  l'energia 
                cosmica.  Attraverso  una  combinazione  di  conoscenze  astrologiche,  spirituali  e 
                intuitive, il consulente aiuta le persone a comprendere il proprio percorso di vita, le 
                influenze  celesti  e  l'energia  cosmica  che  le  circonda.  Utilizzando  strumenti  come  il 
                tema  natale  e  le  carte  astrali,  fornisce  consigli  personalizzati,  indicazioni 
                sull'equilibrio  energetico  e  metodi  per  sfruttare  al  meglio  il  proprio  potenziale 
                spirituale. Il consulente di illuminazione cosmica facilita l'illuminazione interiore e il 
                raggiungimento di uno stato di armonia e consapevolezza.",
            ],
            [
                'name' => 'Specialista in terapia del respiro degli unicorni',
                'expertise' => 'Professionista',
                'description' => "Il  ruolo  di  Specialista  in  terapia  del  respiro  degli  unicorni  è  un  connubio  tra  la  cura  del 
                respiro umano e l'uso delle proprietà magiche degli unicorni. Questi esperti sono in grado di 
                combinare tecniche respiratorie avanzate con l'energia positiva rilasciata dagli unicorni per 
                promuovere la salute e il benessere. Attraverso sessioni di terapia personalizzate, aiutano gli 
                individui a migliorare la qualità del respiro, rilassarsi e alleviare lo stress. Utilizzando una 
                combinazione  di  tecniche  di  respirazione,  meditazione  e  la  presenza  rassicurante  degli 
                unicorni,  questi  specialisti  offrono  un  approccio  unico  per  il  trattamento  di  disturbi 
                respiratori e il potenziamento della salute generale.",
            ],
            [
                'name' => 'Dubai lifestyle coach',
                'expertise' => 'Principiante',
                'description' => "Un Dubai lifestyle coach è un professionista che aiuta le persone a migliorare la loro qualità 
                di vita e il loro benessere globale. Offrono consulenza personalizzata su diversi aspetti della 
                vita, come la gestione dello stress, l'equilibrio tra lavoro e vita privata, l'alimentazione, il 
                fitness  e  le  relazioni  personali.  Sfruttando  una  combinazione  di  tecniche  di  coaching, 
                consulenza e strategie di sviluppo personale, lavorano con i clienti per identificare obiettivi 
                chiari e pianificare azioni concrete per raggiungerli. Un lifestyle coach a Dubai tiene conto 
                anche delle specificità culturali e degli stili di vita della città, offrendo un supporto adatto a 
                questo contesto cosmopolita e dinamico.",
            ],
            [
                'name' => 'Sacerdote delle cryptovalute',
                'expertise' => 'Gran maestro',
                'description' => "Il  Sacerdote  delle  cryptovalute  per  cerimonie  di  benedizione  e  protezione  è  un  esperto 
                spirituale che si occupa di guidare e assistere i fedeli nel mondo delle criptovalute. Con una 
                profonda  conoscenza  delle  blockchain  e  delle  nuove  tecnologie finanziarie,  il  Sacerdote 
                offre  cerimonie  speciali  per  benedire  e  proteggere  i  portafogli  digitali  e  le  transazioni 
                criptate. Attraverso  rituali  simbolici  e  preghiere  adattate  al  contesto  delle  cryptovalute,  il 
                Sacerdote promuove la consapevolezza, la sicurezza e la prosperità finanziaria nel mondo 
                digitale. La sua missione è unire la fede e la tecnologia per aiutare i credenti a navigare nel 
                vasto universo delle criptovalute.",
    
            ],
            [
                'name' => 'Professore della comunicazione aliena',
                'expertise' => 'Professionista',
                'description' => "Il  Professore  di  Comunicazione  Aliena  è  un  esperto  nel  campo  dell'interazione  e  della 
                comprensione  delle  forme  di  comunicazione  extraterrestre. Attraverso  lo  studio  di  lingue, 
                simboli  e  modelli  di  comunicazione  alieni,  il  professore  analizza  e  interpreta  i  messaggi 
                provenienti  da  civiltà  extraterrestri.  Utilizza  metodologie  avanzate  per  decifrare  i  segnali, 
                creando  ponti  di  comunicazione  con  le  culture  aliene.  Lavora  anche  per  diffondere  la 
                consapevolezza sull'esistenza di vita extraterrestre e promuovere una comprensione pacifica 
                tra le specie. La sua ricerca contribuisce alla conoscenza dell'universo e all'apertura di nuove 
                frontiere per l'umanità.",
    
            ],
            [
                'name' => 'Esperto di gestione patrimoniale di crypto',
                'expertise' => 'Esperto',
                'description' => "L'Esperto di gestione patrimoniale di crypto è un professionista specializzato nell'aiutare i 
                clienti a gestire i loro investimenti in criptovalute. Con una solida conoscenza delle diverse 
                criptovalute, delle strategie di trading e degli aspetti legali e regolamentari, l'esperto offre 
                consulenza  personalizzata  per  massimizzare  i  rendimenti  e  mitigare  i  rischi.  Attraverso 
                l'analisi  dei  mercati,  l'esperto  consiglia  sulle  opportunità  di  investimento,  sulla 
                diversificazione del portafoglio e sulla gestione delle transazioni. Svolge anche compiti di 
                sicurezza, identificando le minacce e proponendo soluzioni per proteggere i fondi dei clienti. 
                La sua competenza aiuta a guidare i clienti attraverso il complesso mondo delle criptovalute, 
                fornendo una gestione professionale del patrimonio digitale.",
            ],
            [
                'name' => 'Lifecoach per il successo finanziario',
                'expertise' => 'Esperto',
                'description' =>  "Il Life Coach per il successo finanziario attraverso le cryptovalute è un professionista che 
                guida e supporta le persone nell'esplorare e sfruttare le opportunità finanziarie offerte dalle 
                criptovalute. Utilizzando la propria esperienza e competenza nel settore delle criptovalute, il 
                Life  Coach  aiuta  i  clienti  a  comprendere  i  concetti  fondamentali  delle  criptovalute,  a 
                identificare  opportunità  di  investimento  e  a  sviluppare  strategie  personalizzate  per 
                massimizzare  i  guadagni. Attraverso  sessioni  di  coaching  individuali  o  di  gruppo,  il  Life 
                Coach fornisce orientamento finanziario, incoraggiamento e sostegno emotivo per aiutare i 
                clienti a raggiungere i loro obiettivi finanziari utilizzando le cryptovalute.",
            ],
            [
                'name' => 'Consulente per il recupero degli amori perduti',
                'expertise' => 'Professionista',
                'description' => "Un  Consulente  per  il  recupero  degli  amori  perduti  è  un  professionista  specializzato  nel 
                fornire supporto emotivo e strategie pratiche per aiutare le persone a riconnettersi con i loro 
                ex partner. Attraverso sessioni di consulenza individuali o di coppia, il consulente ascolta 
                attentamente  le  esperienze  personali,  identifica  le  problematiche  relazionali  e  suggerisce 
                soluzioni  personalizzate.  Utilizzando  una  combinazione  di  tecniche  di  comunicazione, 
                consapevolezza emotiva e gestione dei conflitti, il consulente aiuta i clienti a comprendere i 
                motivi  della  rottura  e  a  lavorare  verso  una  riconciliazione,  quando  appropriato.  Il  suo 
                obiettivo è aiutare le persone a recuperare e coltivare relazioni amorose significative.",
            ],
            [
                'name' => 'Maestro della terapia degli abbracci',
                'expertise' => 'Gran maestro',
                'description' => "Il Maestro della terapia degli abbracci è un professionista esperto nell'arte di fornire comfort 
                e  sostegno  attraverso  l'abbraccio.  Con  una  profonda  conoscenza  delle  esigenze  emotive  e 
                fisiche  delle  persone,  il  Maestro  crea  uno  spazio  sicuro  e  accogliente  in  cui  gli  individui 
                possono  esprimere  le  proprie  emozioni  e  trovare  sollievo  dallo  stress  e  dalla  solitudine. 
                Attraverso  abbracci  empatici  e  amorevoli,  il  Maestro  facilita  il  rilascio  di  endorfine  e  la 
                riduzione  dello  stress,  promuovendo  il  benessere  mentale  e fisico.  Questa  professione 
                richiede  sensibilità,  empatia  e  una  profonda  comprensione  del  potere  curativo 
                dell'abbraccio."
            ],
        ];


        foreach($specializations as $specInfo){

            $specialization = new Specialization();
            $specialization->name = $specInfo['name'];
            $specialization->expertise = $specInfo['expertise'];
            $specialization->description = $specInfo['description'];

            $specialization->save();
        }
    }
}
