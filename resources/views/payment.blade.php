@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div id="promotion-buttons" style="display: block;" class="d-flex justify-content-center gap-5 mb-5">
            <!-- SPONSORSHIP-->
            @foreach ($sponsorships as $sponsorship)
                <div class="card message-style" style="width: 18rem;">
                    <div class="d-flex justify-content-center mt-2">
                        <img src="{{asset('/img/varie/sponsor.webp')}}" class="card-img-top sponsor-img" alt="...">
                    </div>
                    
                    <div class="card-body">
                        <p class="card-text">{{$sponsorship->description}}</p>
                        <button onclick="showDropIn(this)" data-id="{{ $sponsorship->id }}"
                            data-duration="{{ $sponsorship->duration }}" data-description="{{ $sponsorship->description }}"
                            class="modify-button modify-link">
                            Sponsorizzati per {{ $sponsorship->duration }} ore - per soli {{ $sponsorship->price }} €
                        </button>
                    </div>
                </div>
                
            @endforeach
        </div>

        {{-- DROP IN BRAINTREE --}}
        <div id="drop-in-container" style="display: none;">
            <form id="payment-form" method="post" action="{{ route('processPayment') }}">
                @csrf
                <div id="dropin-container"></div>
                <input type="hidden" name="payment_amount" id="payment_amount" value="{{ $defaultPaymentAmount }}">
                <input class="modify-button modify-link" type="submit" value="Effettua pagamento">
                <button onclick="returnToPromotions()" class="modify-button modify-link">Torna alla lista sponsorizzazioni</button>
            </form>
        </div>

        <div id="promotion-summary" style="display: none;">
            <h3 class="text-white">Riepilogo sponsorizzazione</h3>
            <p class="text-white">Durata: <span id="promotion-duration"></span></p>
            <p class="text-white">Prezzo: <span id="promotion-price"></span> €</p>
            <p class="text-white">Descrizione: <span id="promotion-description"> </span></p>
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

            // Aggiorna l'importo predefinito nel modulo di pagamento
            document.getElementById('payment_amount').value = paymentAmount;

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
