@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="promotion-buttons" style="display: block;">
            <!-- SPONSORSHIP BUTTON -->
            @foreach ($sponsorships as $sponsorship)
                <button onclick="showDropIn(this)" data-id="{{ $sponsorship->id }}"
                    data-duration="{{ $sponsorship->duration }}" data-description="{{ $sponsorship->description }}"
                    class="btn btn-primary">
                    Sponsorizzati per {{ $sponsorship->duration }} ore - per soli {{ $sponsorship->price }} €
                </button>
            @endforeach

        </div>

        {{-- DROP IN BRAINTREE --}}
        <div id="drop-in-container" style="display: none;">
            <form id="payment-form" method="post" action="{{ route('processPayment') }}">
                @csrf
                <div id="dropin-container"></div>
                <input type="hidden" name="payment_amount" id="payment_amount" value="{{ $defaultPaymentAmount }}">
                <input class="btn btn-primary" type="submit" value="Effettua pagamento">
                <button onclick="returnToPromotions()" class="btn btn-primary">Torna alla lista sponsorizzazioni</button>
            </form>
        </div>

        <div id="promotion-summary" style="display: none;">
            <h3>Riepilogo sponsorizzazione</h3>
            <p>Durata: <span id="promotion-duration"></span></p>
            <p>Prezzo: <span id="promotion-price"></span> €</p>
            <p>Descrizione: <span id="promotion-description"> </span></p>
        </div>
    </div>

    {{-- SCRIPT DROP IN  --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
    <script>
        var dropinInstance = null;

        function initializeDropIn(clientToken) {
            if (dropinInstance) {
                dropinInstance.teardown(function(teardownErr) {
                    if (teardownErr) {
                        console.error('Errore durante lo smontaggio del Drop-in:', teardownErr);
                    }
                    createDropIn(clientToken);
                });
            } else {
                createDropIn(clientToken);
            }
        }

        function createDropIn(clientToken) {
            braintree.dropin.create({
                authorization: clientToken,
                container: '#dropin-container'
            }, function(createErr, instance) {
                if (createErr) {
                    console.log('Errore durante la creazione di Drop-in:', createErr);
                    return;
                }

                dropinInstance = instance;

                var form = document.querySelector('#payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    dropinInstance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.log('Errore durante il pagamento:', err);
                            return;
                        }

                        // Aggiungo nonce al form e invio
                        document.querySelector('#payment_method_nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
        }

        function showDropIn(button) {
            var id = button.getAttribute('data-id');
            var duration = button.getAttribute('data-duration');
            var description = button.getAttribute('data-description');

            document.getElementById('promotion-buttons').style.display = 'none';
            document.getElementById('drop-in-container').style.display = 'block';
            document.getElementById('promotion-summary').style.display = 'block';

            var clientToken = "{{ $clientToken }}";
            selectedSponsorshipId = id;

            initializeDropIn(clientToken);

            // PAGAMENTO IN BASE ALLA DURATA
            var paymentAmount = 0;
            if (duration === '24') {
                paymentAmount = 2.99;
            } else if (duration === '72') {
                paymentAmount = 5.99;
            } else if (duration === '144') {
                paymentAmount = 9.99;
            }

            // TESTO BOTTONE EFFETTUA PAGAMENTO
            var paymentButton = document.querySelector('#payment-form input[type="submit"]');
            paymentButton.value = 'Effettua pagamento di € ' + paymentAmount;

            // RIEPILOGO ACQUISTO
            var promotionDuration = document.getElementById('promotion-duration');
            promotionDuration.textContent = duration + ' ore';

            var promotionPrice = document.getElementById('promotion-price');
            promotionPrice.textContent = paymentAmount.toFixed(2);

            var promotionDescription = document.getElementById('promotion-description');
            promotionDescription.textContent = description;
        }

        // NASCONDI DROP IN E VEDI SOLO SPONSORIZZAZIONI
        function returnToPromotions() {
            document.getElementById('promotion-buttons').style.display = 'block';
            document.getElementById('drop-in-container').style.display = 'none';
            document.getElementById('promotion-summary').style.display = 'none';
        }
    </script>
@endsection
