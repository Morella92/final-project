@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h2>Ciao {{ Auth::user()->name }}, completa il tuo profilo da professore!</h2>
        <p>I campi contrassegnati dall'*</p>
        <form class="row g-3" action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <label for="phone" class="form-label">Numero di telefono</label>
                <input type="text" name="phone" value="" class="form-control @error('phone') is-invalid @enderror"
                    id="phone" placeholder="Inserisci il tuo contatto">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="specializations" class="form-label">Specializzazione *</label>
                <div class="d-flex @error('specializations') is-invalid @enderror flex-wrap gap-3">
                  @foreach($specializations as $key => $specialization)
                    <div class="form-check">
                      <input name="specializations[]" @checked( in_array($specialization->id, old('specializations',[])))  
                      class="form-check-input" type="checkbox" value="{{ $specialization->id }}" id="specializations[]"  
                      {{ old('specializations[]') ? 'checked' : '' }}>
                      <label class="form-check-label" for="flexCheckDefault">
                        {{ $specialization->name }}
                      </label>
                    </div>
                  @endforeach
                </div>
                @error('specializations[]')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
        
            <div class="col-12">
                <label for="performance" class="form-label fw-bold text-uppercase">Prestazioni</label>
                <div class="form-floating">
                    <textarea class="form-control" name="performance" value=""
                        class="form-control @error('performance') is-invalid @enderror" id="performance"
                        placeholder="Inserisci la tua prestazione" style="height: 300px">
                    </textarea>
                    @error('performance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="mt-2">
                    <label for="cv" class="form-label fw-bold text-uppercase">Carica Curriculum Vitae in formato
                        immagine</label>
                    <div class="input-group mb-3">
                        <input type="file" name="cv" value=""
                            class="form-control @error('cv') is-invalid @enderror" id="inputGroupFile02">

                        @error('cv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="picture" class="form-label fw-bold text-uppercase">Carica immagine di profilo</label>
                    <div class="input-group mb-3">
                        <input type="file" value="picture" class="form-control @error('image') is-invalid @enderror"
                            id="inputGroupFile02">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Crea profilo</button>
            </div>

        </form>
    </div>
@endsection
