@extends('layouts.app')

@section('content')
    <html>

    <head>
        <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
    </head>

    <body>
        <form id="payment-form" method="post" action="{{ route('processPayment') }}">
            @csrf
            <div id="dropin-container"></div>
            <input type="submit" value="Paga">
        </form>

        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{ $clientToken }}";

            braintree.dropin.create({
                authorization: client_token,
                container: '#dropin-container'
            }, function(createErr, instance) {
                if (createErr) {
                    console.log('Errore durante la creazione di Drop-in:', createErr);
                    return;
                }
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.log('Errore durante il pagamento:', err);
                            return;
                        }

                        // Aggiungi il nonce al form e invia
                        document.querySelector('#payment_method_nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
        </script>
    </body>

    </html>
@endsection
