@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h2>Ciao {{ Auth::user()->name }}, modifica il tuo profilo!</h2>
        <form class="row g-3" action="{{ route('teachers.store') }}" method="POST">
            @csrf

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
            {{-- checkbox --}}

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Default checkbox
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Checked checkbox
                </label>
            </div>

















            {{-- <div class="mb-3 d-flex">
                <label for="specializations" class="form-label">specializationi</label>
                <div class="d-flex ms-5 @error('specializations') is-invalid @enderror flex-wrap gap-3">
                    @foreach ($specialization as $spec)
                        <div class="form-check">
                            <input name="specialization[]" @checked(in_array($specialization->id, old('specializations', $teacher->getSpecializationIds()))) class="form-check-input"
                                type="checkbox" value="{{ $spec->id }}}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $spec->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('specializations')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}













            {{-- accordion --}}
            {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Mostra tutte le specializzazioni
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                            the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                    </div>
                </div>

            </div>
 --}}






            {{-- select --}}
            {{-- 
            <div class="row mb-3 ">
                <label for="specialization" class="col-sm-2 col-form-label">SPECIALIZZAZIONI</label>
                <div class="col-sm-10">
                    <select class="form-select @error('specialization_id') is-invalid @enderror" id="specialization-id"
                        name="specialization_id" aria-label="Default select example">
                        <option value="" selected>Seleziona una specializzazione</option>
                        @foreach ($specialization as $spec)
                            <option @selected(old('spec_id', $teacher->spec_id) == $spec->id) value="{{ $spec->id }}">
                                {{ $spec->name }}</option>
                        @endforeach
                    </select>
                    @error('specialization_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}


            {{-- prova --}}
            <div class="col-12">
                <label for="specialization" class="form-label">Specializzazione *</label>
                <input type="text" name="specialization" value="{{ old('specialization', $teacher->specialization) }}"
                    class="form-control @error('specialization') is-invalid @enderror" id="specialization"
                    placeholder="Inserisci la tua specializzazione">
                @error('specialization')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

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
