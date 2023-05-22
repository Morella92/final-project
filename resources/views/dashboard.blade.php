@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{-- {{ __('Dashboard') }}  --}}
        Pannello di amministrazione dell'Insegnante di {{  Auth::user()->name }}
    </h2>
       {{-- VISTA TEACHER LIST INDEX --}}
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('/img/varie/teachers.jpeg') }}" class="card-img-top" alt="..."
        <div class="card-body">
      <h5 class="card-title text-uppercase text-center fw-bold text-danger mt-3">lista insegnanti</h5>

      <p class="card-text">Clicca sul bottone per visualizzare ls lista completa dei INSEGNANTI.</p>
      <a href="{{ route('teachers.index')}}" class="btn btn-primary text-uppercase fw-bolder">Mostra lista insegnanti</a>
    </div>
  </div>


    <div>
        
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
                
            </div>
        </div>
    </div> --}}
</div>
@endsection
