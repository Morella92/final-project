@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h2>Ciao {{ Auth::user()->name }}, modifica il tuo profilo!</h2>
        <form class="row g-3" action="{{ route('teachers.update', $teacher) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="phone" class="form-label">Numero di telefono</label>
                <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}"
                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                    placeholder="Inserisci il tuo contatto">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" name="address" value="{{ Auth::user()->address }}"
                    class="form-control @error('address') is-invalid @enderror" id="address"
                    placeholder="Inserisci il tuo contatto">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

{{-- ATTENZIONE --}}
            <div class="mb-3">
                <label for="specializations" class="form-label">Specializzazione *</label>
                <div class="d-flex @error('specializations') is-invalid @enderror flex-wrap gap-3">
                  
                  @foreach($specializations as $specialization)
                    <div class="form-check">
                      <input name="specializations[]" @checked( in_array($specialization->id, old('specializations', $teacher->getSpecializationIds()) ) ) class="form-check-input" type="checkbox" value="{{ $specialization->id }}" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        {{ $specialization->name }}
                      </label>
                    </div>
                  @endforeach
                </div>
  
                @error('specializations')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
  
{{-- ATTENZIONE --}}

            <div class="col-12">
                <label for="performance" class="form-label">Prestazioni</label>
                <input type="text" name="performance" value="{{ old('performance', $teacher->performance) }}"
                    class="form-control @error('performance') is-invalid @enderror" id="performance"
                    placeholder="Inserisci la tua prestazione">
                @error('performance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label for="credit_card" class="form-label">Carta di credito</label>
                <input type="text" name="credit_card" value="{{ old('credit_card', $teacher->credit_card) }}"
                    class="form-control @error('credit_card') is-invalid @enderror" id="credit_card"
                    placeholder="Inserisci la tua carta">
                @error('credit_card')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="file" name="cv" value="" class="form-control @error('cv') is-invalid @enderror"
                    id="inputGroupFile02">

                @error('cv')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="file" value="picture" class="form-control @error('image') is-invalid @enderror"
                    id="inputGroupFile02">
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
