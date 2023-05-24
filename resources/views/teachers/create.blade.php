@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2>Ciao {{  Auth::user()->name }}, crea il tuo profilo!</h2>
    <form class="row g-3" action="{{ route('teachers.store') }}" method="POST">
      @csrf
      
      <div class="col-md-6">
        <label for="phone" class="form-label">Numero di telefono</label>
        <input type="text" value="{{('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Inserisci il tuo contatto">
        @error('phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="col-12">
        <label for="specialization" class="form-label">Specializzazione *</label>
        <input type="text" value="{{('specialization')}}" class="form-control @error('specialization') is-invalid @enderror" id="specialization" placeholder="Inserisci la tua specializzazione">
        @error('specialization')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="col-12">
        <label for="performance" class="form-label">Prestazioni</label>
        <input type="text" value="performance" class="form-control @error('performance') is-invalid @enderror" id="performance" placeholder="Inserisci la tua prestazione">
        @error('performance')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-12">
        <label for="credit_card" class="form-label">Carta di credito</label>
        <input type="text" value="credit_card" class="form-control @error('credit_card') is-invalid @enderror" id="credit_card" placeholder="Inserisci la tua carta">
        @error('credit_card')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="file" value="cv" class="form-control @error('cv') is-invalid @enderror" id="inputGroupFile02">
        <label class="input-group-text" for="inputGroupFile02">Carica il tuo cv</label>
        @error('cv')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="input-group mb-3">
        <input type="file" value="picture" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile02">
        <label class="input-group-text" for="inputGroupFile02">Carica la tua foto profilo</label>
        @error('image')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Crea profilo</button>
      </div>
    </form>
</div>
@endsection