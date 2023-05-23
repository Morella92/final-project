@extends('layouts.app')

@section('content')
<div class="container py-5">
    <form class="row g-3">
        <div class="row g-3">
            <div class="col">
              <label for="name" class="form-label">Nome Cognome *</label>
              <input type="text" class="form-control" placeholder="Nome Cognome" aria-label="Nome" value="{{  Auth::user()->name }}">

              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label disable">Email *</label>
          <input type="email" class="form-control" id="inputEmail4" value="{{  Auth::user()->email }}">
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="phone-number" class="form-label">Numero di telefono</label>
          <input type="text" class="form-control" id="phone-number" placeholder="Inserisci il tuo contatto">
          @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Indirizzo *</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Inserisci il tuo indirizzo" value="{{  Auth::user()->address }}">
          @error('address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-12">
          <label for="specialization" class="form-label">Specializzazione *</label>
          <input type="text" class="form-control" id="specialization" placeholder="Inserisci la tua specializzazione">
          @error('specialization')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="col-12">
          <label for="performance" class="form-label">Prestazioni</label>
          <input type="text" class="form-control" id="performance" placeholder="Inserisci la tua prestazione">
          @error('performance')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02">
          <label class="input-group-text" for="inputGroupFile02">Carica il tuo cv</label>
          @error('cv')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02">
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