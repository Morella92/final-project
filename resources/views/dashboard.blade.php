@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4 text-white">
            {{-- {{ __('Dashboard') }}  --}}
            Pannello di amministrazione dell'Insegnante <span class="fw-bold text-uppercase">{{ Auth::user()->name }}</span>
        </h2>

        {{-- stelle --}}

        <div class="pb-3 d-flex justify-content-end">
            @php
                $user = Auth::user();
                $teacher = $user->teacher;
                
                if ($teacher) {
                    $votes = $teacher->votes;
                    $prova = [];
                
                    foreach ($votes as $vote) {
                        $prova[] = $vote->vote;
                    }
                
                    $averageVote = collect($prova)->average();
                } else {
                    $averageVote = 0;
                }
            @endphp
            @if ($averageVote == 0)
                <span class="text-white">Livello di gradimento:</span>
                <span class="text-danger">N/D</span>
            @else
                <span class="text-white me-2">Livello di gradimento:</span>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $averageVote)
                        <i class="fa-solid fa-star fa-beat-fade" style="color: #e6de00;"></i>
                    @else
                        <i class="fas fa-star text-black opacity-25"></i>
                    @endif
                @endfor
            @endif
        </div>

        <div class="">
            {{-- MESSAGGI DI ERRORE IN SESSIONE --}}
            @if (session('error') && session('error_expiry') > time())
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.querySelector('.alert').remove();
                    }, 5000);
                </script>
            @endif

            <div class="row d-flex justify-content-around mb-5">
                <div class="col-6 card message-style m-3" style="width: 30rem;">
                    <h5 class="card-title text-uppercase text-center fw-bold mt-3 title-style">gestisci il tuo profilo</h5>
                    <div class="d-flex justify-content-center">
                        <img class="dashboard-img" src="{{ asset('/img/varie/avatar.webp') }}" alt="">
                    </div>

                    <p class="card-text p-3">Benvenuto nella tua area personale! Inizia ora a valorizzare la tua esperienza
                        ed competenze!</p>

                    <div class="text-center mb-3">

                        @if (isset(Auth::user()->teacher->specializations))
                            <button class="dashboard-button">
                                <a href="{{ route('teachers.edit', Auth::user()->teacher->id) }}"
                                    class="text-uppercase fw-bolder dashboard-link">
                                    Modifica profilo docente
                                </a>
                            </button>
                            <button class="dashboard-button mt-2">
                                <a class="dashboard-link text-uppercase fw-bolder"
                                    href="{{ url('profile') }}">{{ __('Modifica profilo anagrafico') }}</a>
                            </button>
                        @else
                            <a href="{{ route('teachers.create') }}" class="btn btn-danger text-uppercase fw-bolder">
                                Completa il profilo
                            </a>
                        @endif

                    </div>
                </div>

                <div class="col-6 card message-style m-3" style="width: 30rem;">
                    <h5 class="card-title text-uppercase text-center fw-bold mt-3 title-style">Messaggi e Recensioni</h5>
                    <div class="d-flex justify-content-center">
                        <img class="dashboard-img" src="{{ asset('/img/varie/emails.gif') }}" alt="">
                    </div>
                    <p class="card-text p-3">Benvenuto nella sezione dei messaggi e delle recensioni! Scopri le tue
                        comunicazioni non lette.</p>

                    <div class="text-center mb-3">

                        @if (isset(Auth::user()->teacher->specializations))
                            <button class="dashboard-button text-uppercase fw-bolder">
                                <a class="dashboard-link" href="{{ route('messages.index') }}">
                                    Visualizza i tuoi messaggi
                                </a>
                            </button>
                            <button class="dashboard-button text-uppercase fw-bolder mt-2">
                                <a class="dashboard-link" href="{{ route('reviews.index') }}">
                                    Guarda le tue recensioni
                                </a>
                            </button>
                        @else
                        @endif

                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around mb-5">
                <div class="col-6 card message-style m-3" style="width: 30rem;">
                    <h5 class="card-title text-uppercase text-center fw-bold mt-3 title-style">asponsorizzazioni</h5>
                    <div class="d-flex justify-content-center">
                        <img class="dashboard-img" src="{{ asset('/img/varie/pos.webp') }}" alt="">
                    </div>

                    <p class="card-text p-3">Promuovi le tue competenze in modo efficace! Valorizza al meglio le tue abilità
                        e capacità per ottenere il riconoscimento che meriti.</p>

                    <div class="text-center mb-3">

                        @if (isset(Auth::user()->teacher->specializations))
                            <button class="dashboard-button">
                                <a href="{{ route('payment') }}" class="dashboard-link text-uppercase fw-bold">attiva
                                    sponsorizzazioni</a>
                            </button>
                        @else
                        @endif

                    </div>
                </div>
                <div class="col-6 card message-style m-3" style="width: 30rem;">
                    <h5 class="card-title text-uppercase text-center fw-bold mt-3 title-style">statistiche</h5>
                    <div class="d-flex justify-content-center">
                        <img class="dashboard-img" src="{{ asset('/img/varie/grafici.webp') }}" alt="">
                    </div>

                    <p class="card-text p-3">Osserva le statistiche dei tuoi messaggi e scopri il successo che stanno
                        ottenendo!</p>

                    <div class="text-center mb-3">

                        @if (isset(Auth::user()->teacher->specializations))
                            <button class="dashboard-button">
                                <a href="{{ route('bar-chart') }}" class="dashboard-link text-uppercase fw-bold">visualizza
                                    statiistiche</a>
                            </button>
                        @else
                        @endif

                    </div>
                </div>
            </div>


        </div>
    @endsection
