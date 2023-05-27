@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{-- {{ __('Dashboard') }}  --}}
            Pannello di amministrazione dell'Insegnante <span class="fw-bold text-uppercase">{{ Auth::user()->name }}</span>
        </h2>

        <div class="d-flex gap-3 flex-wrap">
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
        </div>
    </div>
@endsection
