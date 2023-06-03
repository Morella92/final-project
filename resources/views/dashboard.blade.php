@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4 text-white">
            {{-- {{ __('Dashboard') }}  --}}
            Pannello di amministrazione dell'Insegnante <span class="fw-bold text-uppercase">{{ Auth::user()->name }}</span>
        </h2>
        {{-- stelle --}}
        <div class="pb-3">
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
                <span class="text-white">Livello di gradimento:</span>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $averageVote)
                        <i class="fa-solid fa-star fa-beat-fade" style="color: #e6de00;"></i>
                    @else
                        <i class="fas fa-star text-black opacity-25"></i>
                    @endif
                @endfor
            @endif
        </div>
        <div class="d-flex gap-3 flex-wrap">
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
            {{-- OFF CANVAS --}}
            <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">Toggle offcanvas</button>

            <div class="alert alert-info d-none d-lg-block">Resize your browser to show the responsive offcanvas toggle.
            </div>

            <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasResponsive"
                aria-labelledby="offcanvasResponsiveLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Responsive offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <p class="mb-0">This is content within an <code>.offcanvas-lg</code>.</p>
                </div>
            </div>
            {{-- GESTISTI IL TUO PROFILO --}}
            <div class="card" style="width: 20rem;">

                <img src="{{ asset('/img/varie/teachers.jpeg') }}" class="card-img-top" alt="..." <div
                    class="card-body">
                <h5 class="card-title text-uppercase text-center fw-bold text-danger mt-3">gestisci il tuo profilo</h5>

                <p class="card-text">Usa i bottoni sottostanti per completare o modificare il tuo profilo utente.</p>
                <div class="text-center">

                    <div class="card" style="width: 20rem;">

                        @if (isset(Auth::user()->teacher->specializations))
                            <a href="{{ route('teachers.edit', Auth::user()->teacher->id) }}"
                                class="btn btn-primary text-uppercase fw-bolder">
                                Modifica il tuo profilo
                            </a>
                        @else
                            <a href="{{ route('teachers.create') }}" class="btn btn-danger text-uppercase fw-bolder">
                                Completa il profilo
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            {{-- VISTA TEACHER LIST INDEX --}}
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('/img/varie/teachers.jpeg') }}" class="card-img-top" alt="..." <div
                    class="card-body">
                <h5 class="card-title text-uppercase text-center fw-bold text-danger mt-3">lista insegnanti</h5>

                <p class="card-text">Clicca sul bottone per visualizzare ls lista completa dei INSEGNANTI.</p>
                <div>
                    @if (isset(Auth::user()->teacher->specializations))
                        <a href="{{ route('teachers.index') }}" class="btn btn-primary text-uppercase fw-bolder"
                            style="width: 100%;">
                            Lista insegnanti
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="buttons py-4">
            {{-- MESSAGGI --}}
            <button class="modify-button">
                <a class="modify-link" href="{{ route('messages.index') }}">
                    Visualizza i tuoi messaggi
                </a>
            </button>
            {{-- REVIEWS --}}
            <button class="modify-button">
                <a class="modify-link" href="{{ route('reviews.index') }}">
                    Guarda le tue recensioni
                </a>
            </button>
            <div class="nav-item">
                <a class="nav-link link-style" href="{{ url('profile') }}">{{ __('Profilo utente') }}</a>
            </div>
            <div>
                <a href="{{ route('payment') }}" class="btn btn-primary">Pagamenti</a>

            </div>
        </div>
    </div>
@endsection
