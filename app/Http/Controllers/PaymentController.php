<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Illuminate\Http\Request;

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
    

    public function showPaymentForm()
    {
        $clientToken = $this->gateway->clientToken()->generate();

        return view('payment', compact('clientToken'));
    }

    public function processPayment(Request $request)
    {
        $nonce = $request->input('payment_method_nonce');
    
        $result = $this->gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            // Pagamento completato con successo
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


  

}