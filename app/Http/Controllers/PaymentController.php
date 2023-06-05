<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Sponsorship;
use App\Models\SponsorshipTeacher;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SponsorshipTeacherController;
use Carbon\Carbon;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
    }

    /**
     * Mostra il modulo di pagamento.
     *
     * @return \Illuminate\View\View
     */
    public function showPaymentForm()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        $sponsorships = Sponsorship::all();
        $selectedSponsorshipId = null;
        
        // Calcola l'importo predefinito in base alla durata della prima sponsorizzazione
        $defaultSponsorship = $sponsorships->first();
        $defaultPaymentAmount = 0;
        if ($defaultSponsorship) {
            $defaultPaymentAmount = $this->calculatePaymentAmount($defaultSponsorship->duration);
        }
    
        return view('payment', compact('clientToken', 'defaultPaymentAmount', 'sponsorships', 'selectedSponsorshipId'));
    }
    
    private function calculatePaymentAmount($duration)
    {
        if ($duration === '24') {
            return 2.99;
        } elseif ($duration === '72') {
            return 5.99;
        } elseif ($duration === '144') {
            return 9.99;
        }
    
        return 0;
    }


    /**
     * Elabora il pagamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processPayment(Request $request)
    {
        $nonce = $request->input('payment_method_nonce');
        $sponsorshipId = $request->input('sponsorship_id');

        $result = $this->gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // Pagamento completato con successo

            // Aggiorna il campo "inizio_sponsorizzazione" per l'utente autenticato
            $user = Auth::user();
            $sponsorship = Sponsorship::find($sponsorshipId);
            $inizioSponsorizzazione = Carbon::now(); // Imposta la data corrente come inizio della sponsorizzazione

            // Rimuovi eventuali vecchie sponsorizzazioni per l'utente
            SponsorshipTeacher::where('user_id', $user->id)->delete();

            // Aggiungi la nuova sponsorizzazione
            SponsorshipTeacher::create([
                'user_id' => $user->id,
                'sponsorship_id' => $sponsorshipId,
                'inizio_sponsorizzazione' => $inizioSponsorizzazione,
            ]);

            return redirect()->back()->with('success_message', 'Pagamento completato con successo!');
        } else {
            // Pagamento fallito
            $errorString = "";
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return back()->withErrors('Il pagamento ha fallito. ' . $errorString);
        }
    }

    public function teacherSponsorship()
    {
        // Recupero le "sponsorships"
        $sponsorships = Sponsorship::all();
        if ($sponsorships->isEmpty()) {
            // Gestisci il caso in cui non ci siano sponsorizzazioni disponibili
        }
        return view('payment', ['sponsorships' => $sponsorships]);
    }

    


}