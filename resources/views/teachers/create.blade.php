@extends('layouts.app')

@section('content')
<div class="container py-5">
    <form class="row g-3">
        <div class="row g-3">
            <div class="col">
                <label for="name" class="form-label">Nome Cognome *</label>
                <input type="text" class="form-control" placeholder="Nome Cognome" aria-label="Nome">
            </div>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label disable">Email *</label>
          <input type="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password *</label>
          <input type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <label for="phone-number" class="form-label">Numero di telefono</label>
            <input type="text" class="form-control" id="phone-number" placeholder="Inserisci il tuo contatto">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Indirizzo</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Inserisci il tuo indirizzo">
        </div>
        <div class="col-12">
          <label for="specialization" class="form-label">Specializzazione</label>
          <input type="text" class="form-control" id="specialization" placeholder="Inserisci la tua specializzazione">
        </div>
        <div class="col-12">
            <label for="performance" class="form-label">Prestazioni</label>
            <input type="text" class="form-control" id="performance" placeholder="Inserisci la tua prestazione">
          </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Carica il tuo cv</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Carica la tua foto profilo</label>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>
@endsection