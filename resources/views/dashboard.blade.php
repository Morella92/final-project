@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4 text-white">
            {{-- {{ __('Dashboard') }}  --}}
            Pannello di amministrazione dell'Insegnante <span class="fw-bold text-uppercase">{{ Auth::user()->name }}</span>
        </h2>

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

            {{-- GESTISTI IL TUO PROFILO --}}
            <div class="card" style="width: 20rem;">

                <img src="{{ asset('/img/varie/teachers.jpeg') }}" class="card-img-top" alt="..." <div class="card-body">
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

            {{-- MESSAGGI --}}
            <button>
                <a href="{{ route('messages.index') }}">
                    MESSAGGI
                </a>
            </button>
            {{-- REVIEWS --}}
            <button>
                <a href="{{ route('reviews.index') }}">
                    RECENSIONI
                </a>
            </button>
        </div>

        {{-- stelle --}}
        {{-- @php
            $teacher = Auth::user()->teacher;
            $votes = $teacher->votes;
        @endphp

        <div>
            Media dei voti: {{ $votes }}
        </div> --}}
        <div>
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
                    $averageVote = 0; // o un valore predefinito
                }
            @endphp

            <div>

                Media dei voti: {{ $averageVote }}

                <div>

                    @php
                        
                    @endphp
                </div>
            </div>

        </div>

    </div>
@endsection
